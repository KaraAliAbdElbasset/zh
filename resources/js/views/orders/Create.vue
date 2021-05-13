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
                                    <input type="date" class="form-control" id="due" name="due" v-model="estimate.due">
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
                            <div class="form-row"  v-for="(product, i) in estimate.products" :key="i">
                                <div class="col-md-5 mb-3">
                                    <ValidationProvider v-slot="{ errors }" name="name" rules="required">

                                        <input
                                            type="text"
                                            v-model="product.name"
                                            placeholder="Designation"
                                            class="form-control text-capitalize"
                                            autofocus
                                            required
                                        />
                                    </ValidationProvider>
                                    <div class="invalid-feedback">
                                        Vous devez entrer une designation
                                    </div>
                                </div>

                                <div class="col-md-2 mb-3">
                                    <ValidationProvider v-slot="{ errors }" name="qty" rules="required|numeric|min:1|max:6">

                                        <input
                                            v-model="product.qte"
                                            type="number"
                                            @change="calculateLineTotal(product)"
                                            placeholder="Quantité"
                                            class="form-control text-capitalize"
                                            required
                                        />
                                    </ValidationProvider>
                                </div>


                                <div class="col-md-2 mb-3">
                                    <ValidationProvider v-slot="{ errors }" name="price" rules="required|min:1|max:10">

                                        <input
                                            @change="calculateLineTotal(product)"
                                            v-model="product.price"
                                            type="text"
                                            placeholder="Prix unitaire"
                                            class="form-control text-capitalize"
                                            required
                                        />
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
                                    <button :disabled="deleteBtn"  @click="deleteRow(i, product)"  class="btn btn-info rounded-circle float-sm-right"><i class="fas fa-trash"></i></button>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-auto">
                                    <button @click="addNewRow()" :disabled="invalid"  class="btn btn-info rounded-circle"><i class="fas fa-plus"></i></button>
                                </div>
                            </div>
                            <hr class="d-md-none">
                        </div>
                        <hr>
                        <div class="row d-flex justify-content-end" >
                            <div class="col-md-10">
                                <label for="comment">Commentaire</label>
                                <textarea name="comment" id="comment" v-model="estimate.comment" class="form-control" rows="3"></textarea>
                            </div>

                            <div class="col-md-2">
<!--                                <label for="total_ht">Total HT</label>-->
<!--                                <input name="total_ht" id="total_ht" class="form-control" v-model="estimate.sub_total" disabled />-->
                                <label for="total_ttc" class="mt-4">Total TTC (Taxe {{ estimate.tax }}%)</label>
                                <input name="total_ttc" id="total_ttc" class="form-control" :value="estimate.total" disabled />
                            </div>
                        </div>
                        <hr class="mt-4">
                        <div class="text-right">
                            <a href="/orders" class="btn btn-outline-info my-3" style="width: 135px">
                                Annuler
                            </a>
                            <!--                            <button type="button" class="btn btn-tool" data-card-widget="card-refresh"  data-source-selector="#card-refresh-content"></button>-->
                            <button @click="save" :disabled="invalid || loading"  class="btn  btn-info my-3 " type="submit" style="width: 135px">
                                <i v-if="loading" class="fas fa-sync-alt fa-spin"></i>
                                <template v-else>
                                    Ajouter
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
            estimate: {
                total : 0,
                sub_total:0,
                tax:0,
                client_id:null,
                due:null,
                comment:'',
                terms:'',
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
            return this.estimate.products.length === 1
        },
    },
    methods:{
        calculateTotal() {
            let subtotal, total;
            subtotal = this.estimate.products.reduce(function (sum, product) {
                let lineTotal = parseFloat(product.total);
                if (!isNaN(lineTotal)) {
                    return sum + lineTotal;
                }
            }, 0);
            this.estimate.sub_total = subtotal.toFixed(2);
            total = parseFloat((subtotal * (this.estimate.tax / 100)) + subtotal);
            if (!isNaN(total)) {
                this.estimate.total = total.toFixed(2);
            } else {
                this.estimate.total = '0.00'
            }
        },
        calculateLineTotal(product) {
            let total = parseFloat(product.price) * parseFloat(product.qte);
            if (!isNaN(total)) {
                product.total = total.toFixed(2);
            }
            this.calculateTotal();
        },
        deleteRow(index, product) {
            let idx = this.estimate.products.indexOf(product);
            if (idx > -1) {
                this.estimate.products.splice(idx, 1);
            }
            this.calculateTotal();
        },
        addNewRow() {
            this.estimate.products.push({
                name: '',
                price: '',
                qte: '',
                total: 0
            });
            console.log('adzadzadaz')
        },
        changed(){
            this.estimate.client_id = this.client.id;
            this.estimate.tax = this.client.type === 'company' ? 19 : 0 ;
            this.calculateTotal();
        },
        save(){
            this.loading = true;
            axios.post('/estimates',this.estimate).then(({data}) => {
                this.$toast.success(data.message);
                window.location = '/estimates/'+data.data.id
            }).catch((error) => {
                this.$toast.error(error.response.data.message);
                if (error.response.status === 422)
                    this.$refs.observer.setErrors(error.response.data.errors)
            })
                .finally(() => this.loading = false)
        }
    }
}
</script>


<style scoped>

</style>
