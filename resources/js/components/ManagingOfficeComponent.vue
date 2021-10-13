<template>
    <div class="card">
        <ValidationObserver ref="observer" v-slot="{ validate, reset , invalid}">

        <div class="card-header">
            <h4 class="card-title">المكتب الاداري</h4>
            <div class="row " >
                <div class="col-md-12 ">
                    <ValidationProvider v-slot="{ errors }" name="name" rules="required|max:100">

                        <input type="text" class="form-control" @keyup.enter="$refs.saveBtn.click()" v-model="officer.name" name="name" placeholder="الاسم">
                        <div v-if="errors.length > 0" class="text-danger">
                            {{errors[0]}}
                        </div>
                    </ValidationProvider>

                </div>
                <div class="col-md-12">
                    <ValidationProvider v-slot="{ errors }" name="المنصب" rules="required|max:100">

                        <input type="text" class="form-control" @keyup.enter="$refs.saveBtn.click()" v-model="officer.level" name="level" placeholder="المنصب">
                        <div v-if="errors.length > 0" class="text-danger">
                            {{errors[0]}}
                        </div>
                    </ValidationProvider>
                </div>
            </div>
            <button type="button" class="btn btn-info btn-sm" ref="saveBtn" @click="save" :disabled="invalid || loading" rel="tooltip">
                <i class="material-icons">add</i>
            </button>
        </div>
        </ValidationObserver>
        <div class="card-body ">
            <div class="row" >
                <div class="col-md-5 border h3">الاسم</div>
                <div class="col-md-5 border h3">المنصب</div>
                <div class="col-md-2 border h3">#</div>
            </div>

            <div class="row " v-for="o in officersData" :key="o.name">
                <div class="col-md-5 border">{{o.name}}</div>
                <div class="col-md-5 border">{{o.level}}</div>
                <div class="col-md-2 ">
                    <a href="javascript:void(0)" @click="deleteItem(o)"><i class="material-icons">close</i></a>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
import { required, max} from "vee-validate/dist/rules";
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
extend("max", {
    ...max,
    message: "لا يمكن أن يحتوي هذا الحقل على أكثر من {length} حرفًا",
});
export default {
    name: "ManagingOfficeComponent",
    components:{
        ValidationObserver,
        ValidationProvider,
    },
    props:{
        officers : {
            type: Array,
            default: () => []
        },
        route:String
    },
    data(){
        return {
            officersData : this.officers ? this.officers : [],
            loading:false,
            officer: {
                name:'',
                level:'',
            }
        }
    },
    mounted() {
        console.log(this.officers)
    },
    methods:{
        save(){
            this.officersData.push(this.officer);
            axios.put(this.route,{
                managing_office : this.officersData
            }).then(({data}) => {
                this.officer = {
                    name:'',
                    level:'',
                }
                this.$refs.observer.reset()
            })
        },
        deleteItem(o){
            const index = this.officersData.indexOf(o);
            if (index > -1) {
                this.officersData.splice(index, 1);
                console.log(this.officersData.length === 0)
                axios.put(this.route,{
                    managing_office : this.officersData.length > 0 ? this.officersData : []
                }).then(({data}) => {
                    this.officer = {
                        name:'',
                        level:'',
                    }
                    this.$refs.observer.reset()
                })
            }
        }
    }
}
</script>

<style scoped>

</style>
