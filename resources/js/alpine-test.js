// 最简单的 Alpine 导入测试
import Alpine from 'alpinejs';

console.log('Alpine module:', Alpine);

// 挂载到全局
window.Alpine = Alpine;

// 启动
Alpine.start();

console.log('Alpine started:', Alpine.version);

// 添加一个简单的指令测试
document.addEventListener('alpine:init', () => {
    console.log('Alpine initialized event fired');
    
    // 添加自定义数据
    Alpine.data('test', () => ({
        message: 'Hello from Alpine!',
        show: true,
        toggle() {
            this.show = !this.show;
        }
    }));
});
