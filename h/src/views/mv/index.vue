<template>
    <div>
        <div class="top">
            <el-page-header class="tou" @back="goBack" content="用户详情"></el-page-header>
        </div>
        <div class="main">
                   <el-table
                   :data="tableData"
                    stripe
                    style="width: 100% "
                    fit:false
                    >
                    <el-table-column
                    prop="date"
                    label="MV封面"
                    width="160">
                     <el-avatar src="https://cube.elemecdn.com/0/88/03b0d39583f48206768a7534e55bcpng.png" ></el-avatar>
                    </el-table-column>
                    <el-table-column
                    prop="name"
                    label="MV名"
                    width="200">
                    </el-table-column>
                    <el-table-column
                    prop="phone"
                    label="发布者"
                    width="160">
                    </el-table-column>
                      <el-table-column
                    prop="guan"
                    label="类型"
                    width="160">
                    </el-table-column>
                      <el-table-column
                    prop="fen"
                    label="播放量"
                    width="160">
                   
                    </el-table-column>
                        <el-table-column
                    prop="fen"
                    label="上传时间"
                    width="160">
                   
                    </el-table-column>
                    <el-table-column
                    prop="shou"
                    label="操作"
                    width="160">
                    <el-button-group>
                        <el-button type="primary" icon="el-icon-circle-plus-outline"  @click="handleAdd()"></el-button>
                        
                        <el-button type="primary" icon="el-icon-delete"></el-button>
                    </el-button-group>
                    </el-table-column>
                  
                </el-table>  
              <el-pagination
            background
            layout="prev, pager, next"
            :total="1000">
        </el-pagination>
       
        </div>
    </div>
</template>

<script>
export default {
    methods: {
        goBack() {
            this.$router.push("/user/index");
        },
         handleAdd() {
       
            this.$router.push("/mv/Add");
        },
    },
    data() {
      return {
        tableData: [{
      
          name: '王小虎',
          phone: '15004184921',
          guan:'12',
          fen:"0",
          shou:"120首",
         
        }, ],
        value: "",
      }
      
},

}
</script>

<style>
    .top{
        width: 100%;
        height: 40px;
        background-color: rgb(255, 255, 255);
    }
    .tou{
        line-height: 40px;
    }
    .main{
        float: left;
        margin-left:1%;
        margin-top: 2%;
    }
    .main li{
        float: left;
        margin: 60px;
    }
    .main li img{
        width: 80px;
        height: 80px;
    }
    .t{
        border-radius: 50%;
    }
</style>