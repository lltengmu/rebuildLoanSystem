export default (options:{ [key: string]: Function }) => {
    let exits = false;
   //检查window对象 是否与点击事件函数命名冲突
   Object.entries(window).forEach(([key, value]) => {
       if (Object.keys(options).includes(key)) exits = true;
   })
   //冲突则抛出异常
   if (exits) throw new ReferenceError("自定义函数与window对象内置函数或属性冲突");
   //否则注册函数
   else Object.entries(options).forEach(([key, value]) => globalThis[key] = value)
}