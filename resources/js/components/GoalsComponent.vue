<template>
    <div class="card">
        <ValidationObserver ref="observer" v-slot="{ validate, reset , invalid}">

        <div class="card-header">
            <h4 class="card-title">الأهداف</h4>
            <div class="row " >
                <div class="col-md-12 ">
                    <ValidationProvider v-slot="{ errors }" name="name" rules="required|max:200">

                        <textarea  class="form-control" @keyup.enter="$refs.saveBtn.click()" v-model="goal" name="goal" placeholder="الهدف">
                        </textarea>
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

            <div class="row " v-for="g in goalsData" :key="g">
                <div class="col-md-10 border">{{g}}</div>
                <div class="col-md-2 ">
                    <a href="javascript:void(0)" @click="deleteItem(g)"><i class="material-icons">close</i></a>
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
        goals : {
            type: Array,
            default: () => []
        },
        route:String
    },
    data(){
        return {
            goalsData : this.goals ? this.goals : [],
            loading:false,
            goal: '',
        }
    },

    methods:{
        save(){
            this.goalsData.push(this.goal);
            axios.put(this.route,{
                goals : this.goalsData
            }).then(({data}) => {
                this.goal = ''
                this.$refs.observer.reset()
            })
        },
        deleteItem(o){
            const index = this.goalsData.indexOf(o);
            if (index > -1) {
                this.goalsData.splice(index, 1);
                axios.put(this.route,{
                    goals : this.goalsData
                }).then(({data}) => {
                    this.goal = ''
                    this.$refs.observer.reset()
                })
            }
        }
    }
}
</script>

<style scoped>

</style>
