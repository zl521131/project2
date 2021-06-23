<template>
<div>
       
      <div class="top">
        <el-breadcrumb separator-class="el-icon-arrow-right">
          <el-breadcrumb-item :to="{ path: '/type/index' }">类别查看</el-breadcrumb-item>
          <el-breadcrumb-item>修改类别</el-breadcrumb-item>
        </el-breadcrumb>
      </div>
            <el-form  status-icon  label-width="100px" class="demo-ruleForm">
            <el-form-item label="类别名" class="guan">
                <el-input type="text"  autocomplete="off" v-model="edit.tname"></el-input>
            </el-form-item>
         
            
            <el-form-item>
                <el-button type="primary"  @click.native="editdo()">修改类别</el-button>
            </el-form-item>
            </el-form>  
    </div>
</template>

<script>
import {typeedit,typeeditdo} from "../../request/api.js";
export default {
  data(){
    return{
      edit:{tname:"",id:""},
    }
  },
   created(){
        let id = this.$route.params.id;
        typeedit({id:id}).then(res=>{
            this.edit= res['0'];
            // console.log(this.edit)
        })
    },
     methods:{
        editdo(){
            typeeditdo(this.edit).then(res=>{
                if(res.code == "200"){
                    alert('修改成功');
                    this.$router.push('/type/index');
                }else{
                    alert("修改失败")
                }
                // console.log(res);
            })
        }
    }

}
</script>

<style>
.guan{
    width: 45%;
    margin-left: 30%;
    margin-top: 3%;
}

  .top{
    width: 100%;
    height: 40px;
    background-color: rgb(255, 255, 255);
  }
  .top span{
    margin-left: 10px;
    line-height: 40px;
    font-size: 14px;
    color: #333;
  }
</style>