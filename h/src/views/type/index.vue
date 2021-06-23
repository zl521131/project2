<template>
    <div>
        <div class="top">
            <el-breadcrumb separator-class="el-icon-arrow-right">
                   <el-breadcrumb-item :to="{ path: '/type/index' }">类别查看</el-breadcrumb-item>
                <el-breadcrumb-item><a href="/admin/index">查看类别</a></el-breadcrumb-item>
            </el-breadcrumb>
        </div>
        <el-input class="search" v-model="search" placeholder="请输入内容"></el-input>
        <el-button class="btn" type="primary" icon="el-icon-search" @click="sou">搜索</el-button>
        <el-table ref="multipleTable" :data="list" tooltip-effect="dark" style="width: 100%" @selection-change="handleSelectionChange">
            <!-- <el-table-column type="selection" width="55"></el-table-column> -->
            <el-table-column prop="id" label="序号" width="120">
            </el-table-column>
            <el-table-column prop="tname" label="类别名" width="120">
            </el-table-column>
            <el-table-column prop="status" label="状态" show-overflow-tooltip>
            </el-table-column>
            <el-table-column label="操作">
                <template slot-scope="scope">
                    <el-button size="mini"  @click="ck(scope.row)">查看子类别</el-button>
                    <el-button size="mini" @click="edit(scope.row)">修改类别</el-button>
                    <el-button size="mini" @click="del( scope.row)">删除类别</el-button>
                 
                </template>
            </el-table-column>
        </el-table>
        <el-pagination
            background
            layout="prev, pager, next"
            :total="1000">
        </el-pagination>
    </div>
</template>

<script>
import {typeindex,typedel,typeedit} from '../../request/api.js'
export default {
    data() {
        return {
            list:[],
            search:"",
            k:"",
            id:"",
            page:1,//当前页
            total:0,//一共多少条
            pnum:2,//每页显示多少条
            ye:[1,2,3]
        }
    },
     created(){
     typeindex().then(res=>{
         this.list = res; 
    })
  },

    methods: {
        toggleSelection(rows) {
            if (rows) {
                rows.forEach(row => {
                    this.$refs.multipleTable.toggleRowSelection(row);
                });
            } else {
                this.$refs.multipleTable.clearSelection();
            }
        },
        handleSelectionChange(val) {
            this.multipleSelection = val;
        },
        info(index, row) {
            this.$router.push("/user/info");
        },
           sou(){
            this.p = 1;  //因为每次搜索的时候,必须回到第一页 
            typeindex({page:this.p,search:this.search}).then(res=>{
                this.list = res.list;
                this.total = res.total;
       })
     },
      ck(a){
            let id = a.id;
            typeindex({id:id}).then((row) => {
                if(row == ""){
                    alert('没有子类了');
                    this.fan = true;
                    this.cha = false;
                    return;
                }else{
                    this.list = row;
                }
            });
        },
        del(b){
            let id = b.id
            // console.log(id);
            typedel({id:id}).then(res=>{
                if(res.code == '300'){
                    alert('顶级类别无法删除');
                }else{
                    if(res.code == '200') {
                        alert('删除成功');
                        this.list.splice(b,1);
                    }else{
                        alert('删除失败');
                    } 
                }
            })
        },
        edit(c){
               let id = c.id;
                typeedit({id:id}).then(res=>{
                this.$router.push("/type/edit/"+id); 
            })
        }
    }

}
</script>

<style>
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
    .search{
        width: 200px !important;
        float: left;
        margin: 30px;
    }
    .btn{
        float: left;
        margin-top: 30px;
        margin-left:-30px ;
    }
</style>