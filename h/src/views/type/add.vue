<template>
    <div>
       
      <div class="top">
        <el-breadcrumb separator-class="el-icon-arrow-right">
          <el-breadcrumb-item :to="{ path: '/type/index' }">类别查看</el-breadcrumb-item>
          <el-breadcrumb-item>类别添加</el-breadcrumb-item>
        </el-breadcrumb>
      </div>
            <el-form  status-icon  label-width="100px" class="demo-ruleForm">
            <el-form-item label="类别名" class="guan">
                <el-input type="text"  autocomplete="off" v-model="add.tname"></el-input>
            </el-form-item>
            <el-form-item label="类别"  class="guan" >
                  <el-select  placeholder="请选择" v-model="list.pid" >
                     <el-option v-for="item in list" :key="item.id" :value="item.tname" :pid="item.pid"> 
                      
                     </el-option>
                  
                  </el-select> 
            </el-form-item>
            
            <el-form-item>
                <el-button type="primary" @click.native="adddo()">添加类别</el-button>
            </el-form-item>
            </el-form> 

                    
        
       
    </div>

</template>

<script>
import {typeadd,typeadddo} from '../../request/api.js'
 export default {
    data(){
        return{
          list:{},
       
          add:{tname:"",pid:""}
        }
    },
     created(){
        typeadd().then((res) => {
            this.list = res;
            // console.log(this.list);
        });
    },
     methods:{
        adddo(){
          this.add.pid = this.list.pid;
            typeadddo(this.add).then(res=>{
              console.log(res);
                alert('添加成功');
                this.$router.push('/type/index');
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