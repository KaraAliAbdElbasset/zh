<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <!-- /.card-header -->
                <ValidationObserver ref="observer" v-slot="{ validate, reset , invalid}">

                    <div class="card-body">
                        <div class="row mb-5">
                            <div class="col">
                                <p class="mb-2 font-weight-bold">الزبون <span class="text-danger">*</span></p>
                                <ValidationProvider v-slot="{ errors }" name="client_id" rules="required">

                                <div :class="{'form-group' :true , 'has-danger' : errors.length > 0 }">
                                        <select class="form-control" @change="changed()" name="client_id" id="client_id"  v-model="client">
                                            <option :value="c" v-for="c in clients" :key="c.id">{{c.name}}</option>
                                        </select>
                                        <div v-if="errors.length > 0" class="text-danger">
                                            {{errors[0]}}
                                        </div>
                                </div>
                                </ValidationProvider>

                            </div>
                            <div class="col">
                                <p class="mb-2 font-weight-bold">تدفع قبل  <span class="text-danger">*</span></p>
                                <ValidationProvider v-slot="{ errors }" name="due" rules="required">
                                    <input type="date" class="form-control" id="due" name="due" v-model="order.due">
                                </ValidationProvider>
                            </div>
                        </div>
                        <hr class="mb-3">
                        <div class="row font-weight-bold mb-2">
                            <div class="col-md-5">منتج <span class="text-danger">*</span></div>
                            <div class="col-md-2">الكمية <span class="text-danger">*</span></div>
                            <div class="col-md-2">سعر الوحدة <span class="text-danger">*</span></div>
                            <div class="col-md-2">إجمالي </div>
                        </div>
                        <div>
                            <div class="form-row"  v-for="(product, i) in order.products" :key="i">
                                <div class="col-md-5 mb-3">
                                    <ValidationProvider v-slot="{ errors }" name="name" rules="required">

                                        <input
                                            type="text"
                                            v-model="product.name"
                                            placeholder="المنتج"
                                            class="form-control text-capitalize"
                                            autofocus
                                            required
                                        />
                                        <div v-if="errors.length > 0" class="text-danger">
                                            {{errors[0]}}
                                        </div>
                                    </ValidationProvider>

                                </div>

                                <div class="col-md-2 mb-3">
                                    <ValidationProvider v-slot="{ errors }" name="qty" rules="required|numeric|min:1|max:6">

                                        <input
                                            v-model="product.qte"
                                            type="number"
                                            @change="calculateLineTotal(product)"
                                            placeholder="الكمية"
                                            class="form-control text-capitalize"
                                            required
                                        />
                                        <div v-if="errors.length > 0" class="text-danger">
                                            {{errors[0]}}
                                        </div>
                                    </ValidationProvider>
                                </div>


                                <div class="col-md-2 mb-3">
                                    <ValidationProvider v-slot="{ errors }" name="price" rules="required|min:1|max:10">

                                        <input
                                            @change="calculateLineTotal(product)"
                                            v-model="product.price"
                                            type="text"
                                            placeholder="سعر الوحدة"
                                            class="form-control text-capitalize"
                                            required
                                        />

                                        <div v-if="errors.length > 0" class="text-danger">
                                            {{errors[0]}}
                                        </div>
                                    </ValidationProvider>
                                </div>

                                <div class="col-md-2 mb-3">
                                    <input
                                        type="number"
                                        v-model="product.total"
                                        value="0"
                                        disabled
                                        class="form-control text-capitalize"
                                    />
                                </div>

                                <div class="col-md-1 mb-3">
                                    <button :disabled="deleteBtn"
                                            @click="deleteRow(i, product)"
                                            class="btn btn-primary btn-fab btn-fab-mini btn-round float-sm-right">
                                        <i class="material-icons">delete</i>
                                    </button>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-auto">
                                    <button @click="addNewRow()"
                                            :disabled="invalid"
                                            class="btn btn-primary btn-fab btn-fab-mini btn-round">
                                        <i class="material-icons">add</i>
                                    </button>
                                </div>
                            </div>
                            <hr class="d-md-none">
                        </div>
                        <hr>
                        <div class="row d-flex justify-content-end" >
                            <div class="col-md-10">
                                <label for="note">تعليق</label>
                                <textarea name="note" id="note" v-model="order.note" class="form-control" rows="3"></textarea>
                            </div>

                            <div class="col-md-2">
<!--                                <label for="total_ht">Total HT</label>-->
<!--                                <input name="total_ht" id="total_ht" class="form-control" v-model="order.sub_total" disabled />-->
                                <label for="total_ttc" class="mt-4">مجموع </label>
                                <input name="total_ttc" id="total_ttc" class="form-control" :value="order.total" disabled />
                            </div>
                        </div>
                        <hr class="mt-4">
                        <div class="text-right">
                            <a href="/orders" class="btn btn-outline-info my-3" style="width: 135px">
                                لالغاء
                            </a>
                            <!--                            <button type="button" class="btn btn-tool" data-card-widget="card-refresh"  data-source-selector="#card-refresh-content"></button>-->
                            <button @click="save" :disabled="invalid || loading"  class="btn  btn-info my-3 " type="submit" style="width: 135px">
                                <i v-if="loading" class="fas fa-sync-alt fa-spin"></i>
                                <template v-else>
                                    حفظ
                                </template>
                            </button>
                        </div>
                    </div>
                </ValidationObserver>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>

</template>


<script>
import { required, max, min, numeric } from "vee-validate/dist/rules";
import {
    extend,
    ValidationObserver,
    ValidationProvider,
    setInteractionMode,
} from "vee-validate";
setInteractionMode("aggressive");
extend("required", {
    ...required,
    message: "هذا الحقل لا يمكن ان يكون فارغا",
});
extend("min", {
    ...min,
    message: "يجب أن يحتوي هذا الحقل على {length} حرفًا على الأقل",
});
extend("max", {
    ...max,
    message: "لا يمكن أن يحتوي هذا الحقل على أكثر من {length} حرفًا",
});
extend("numeric", {
    ...numeric,
    message: "يجب أن يكون هذا الحقل رقمًا",
});
export default {
    name: "Create",
    components:{
        ValidationObserver,
        ValidationProvider,
    },
    props:{
        clients:{
            type:Array,
            required:true
        }
    },
    data(){
        return {
            client:null,
            order: {
                total : 0,
                client_id:null,
                due:null,
                note:'',
                products : [
                    {
                        name: '',
                        qte: null,
                        price:null,
                        total:0,
                    }
                ],
            },
            loading:false,
        }
    },
    computed:{
        deleteBtn(){
            return this.order.products.length === 1
        },
    },
    methods:{
        calculateTotal() {
            let total;
            total = this.order.products.reduce(function (sum, product) {
                let lineTotal = parseFloat(product.total);
                if (!isNaN(lineTotal)) {
                    return sum + lineTotal;
                }
            }, 0);
            this.order.sub_total = total.toFixed(0);
            if (!isNaN(total)) {
                this.order.total = total.toFixed(0);
            } else {
                this.order.total = '0.00'
            }
        },
        calculateLineTotal(product) {
            let total = parseFloat(product.price) * parseFloat(product.qte);
            if (!isNaN(total)) {
                product.total = total.toFixed(0);
            }
            this.calculateTotal();
        },
        deleteRow(index, product) {
            let idx = this.order.products.indexOf(product);
            if (idx > -1) {
                this.order.products.splice(idx, 1);
            }
            this.calculateTotal();
        },
        addNewRow() {
            this.order.products.push({
                name: '',
                price: '',
                qte: '',
                total: 0
            });
        },
        changed(){
            this.order.client_id = this.client.id;
            this.calculateTotal();
        },
        save(){
            this.loading = true;
            axios.post('/orders',this.order).then(({data}) => {
                this.$toast.success(data.message);
                window.location = '/orders/'+data.data.id
            }).catch((error) => {
                this.$toast.error(error.response.data.message);
                if (error.response.status === 422)
                    this.$refs.observer.setErrors(error.response.data.errors)
            }).finally(() => this.loading = false)
        }
    }
}
</script>


<style scoped>

</style>
