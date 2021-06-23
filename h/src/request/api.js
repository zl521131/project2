import axios from 'axios';
import axi from './inter.js';



// 个人中心
// 注册
// export const zc = can=>axi.get("/zc/index",{params:can});
// // 登录
// export const login = can=>axi.get("/zc/dl",{params:can}); 
// 类别
export const typeindex = can=>axi.get("/type/index",{params:can}); 
// 添加类别
export const typeadd = can=>axi.get("/type/add",{params:can}); 
// 添加类别的处理
export const typeadddo = can=>axi.get("/type/adddo",{params:can}); 
// 删除类别
export const typedel = can=>axi.get("/type/del",{params:can}); 
// 修改类别
export const typeedit = can=>axi.get("/type/edit",{params:can}); 
// 处理修改类别的方法
export const typeeditdo = can=>axi.get("/type/editdo",{params:can}); 
// 音乐添加方法
export const musicadd = can=>axi.get("/music/add",{params:can}); 
// 专辑添加方法
export const zjadd = can=>axi.get("/zj/add",{params:can}); 
