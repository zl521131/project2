<template>
    <div>
        <div class="top">
            <el-breadcrumb separator-class="el-icon-arrow-right">
                <el-breadcrumb-item><a href="/admin/index">查看用户</a></el-breadcrumb-item>
            </el-breadcrumb>
        </div>
        <el-input class="search" v-model="input" placeholder="请输入内容"></el-input>
        <el-button class="btn" type="primary" icon="el-icon-search">搜索</el-button>
        <el-table ref="multipleTable" :data="tableData" tooltip-effect="dark" style="width: 100%" @selection-change="handleSelectionChange">
            <el-table-column type="selection" width="55"></el-table-column>
            <el-table-column prop="num" label="序号" width="120">
            </el-table-column>
            <el-table-column prop="name" label="用户名" width="120">
            </el-table-column>
            <el-table-column prop="status" label="状态" show-overflow-tooltip>
            </el-table-column>
            <el-table-column prop="time" label="加入时间" show-overflow-tooltip>
            </el-table-column>
            <el-table-column label="操作">
                <template slot-scope="scope">
                    <el-button size="mini" @click="info(scope.$index, scope.row)">查看详情</el-button>
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
export default {
    data() {
        return {
            tableData: [{
                num:'1',
                time: '2016-05-03',
                name: '李狗蛋',
                status:'正常',
            },],
            multipleSelection: [],
            input: ''
        }
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
            console.log(index, row);
            this.$router.push("/user/info");
        },
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