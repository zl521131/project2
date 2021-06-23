import axios from 'axios';
import axi from './inter.js';



// 个人中心
// 注册
export const zc = can=>axi.get("/zc/Index",{params:can});
// 登录
export const login = can=>axi.get("/zc/Dl",{params:can}); 