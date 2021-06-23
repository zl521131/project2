<template>
  <div>
    
      <div class="top">
        <el-breadcrumb separator-class="el-icon-arrow-right">
          <el-breadcrumb-item :to="{ path: '/zj/index' }">查看专辑</el-breadcrumb-item>
          <el-breadcrumb-item>专辑添加</el-breadcrumb-item>
        </el-breadcrumb>
      </div>
    
        <el-form :label-position="labelPosition" label-width="80px" >
            <el-form-item label="专辑名" >
              <el-input  style="width:40%;"></el-input>
            </el-form-item>
                 <el-form-item label="歌手"  class="guan" >
                  <el-select  placeholder="请选择" v-model="list.sname" >
                     <el-option v-for="item in list" :key="item.id" :value="item.sname" > 
                      
                     </el-option>
                  
                  </el-select> 
            </el-form-item>
          
            <el-form-item label="专辑内容"  class="guan">
            <el-input
              type="textarea"
           
              placeholder="请输入内容"
              >
            </el-input>
            </el-form-item>
          </el-form>
          
          专辑封面上传
           <el-upload
              class="upload-demo"
              drag
              action="https://jsonplaceholder.typicode.com/posts/"
              multiple>
              <i class="el-icon-upload"></i>
              <div class="el-upload__text">将图片拖到此处，或<em>点击上传</em></div>
              
          </el-upload>
          <el-row>
          
            <el-button type="primary">添加专辑</el-button>
          
          </el-row>
         
          <div style="margin: 10px;"></div>
        </div>

</template>

<script>
import {zjadd} from '../../request/api.js'
export default {
 data() {
      return {
        list:{},
        labelPosition: 'top',

      };
  
     
    },
     created(){
        zjadd().then((res) => {
            this.list = res;
            // console.log(this.list);
        });
    },
   
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