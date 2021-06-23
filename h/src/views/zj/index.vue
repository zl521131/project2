<template>
    <div>
        <div class="top">
            <el-page-header class="tou" @back="goBack" content="查看专辑"></el-page-header>
        </div>
        <div class="main" style="margin-left:15%;">
                   <el-table
                   :data="tableData"
                    stripe
                    style="width: 100% "
                    fit:false
                    >
                    <el-table-column
                    prop="pic"
                    label="专辑封面"
                    width="200">
                     <el-avatar src="https://cube.elemecdn.com/0/88/03b0d39583f48206768a7534e55bcpng.png" ></el-avatar>
                    </el-table-column>
                    <el-table-column
                    prop="name"
                    label="专辑名"
                    width="200">
                    </el-table-column>
                    <el-table-column
                    prop="phone"
                    label="上线时间"
                    width="200">
                    </el-table-column>
                   
                   
                    <el-table-column
                    prop="shou"
                    label="操作"
                    width="200">
                    <el-button-group>
                        <el-button type="primary" icon="el-icon-circle-plus-outline"  @click="handleAdd()"></el-button>
                        
                        <el-button type="primary" icon="el-icon-delete"></el-button>
                    </el-button-group>
                    </el-table-column>
                  
                </el-table>  
           
       
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
       
            this.$router.push("/zj/add");
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