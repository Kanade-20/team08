<template>
    <div>
        <div id="chart"></div>
    </div>
</template>
  
<script>
import * as echarts from 'echarts';
import axios from 'axios';

export default {
    data() {
        return {
            cancerStatisticsData: [], // 保存从后端获取的数据
        };
    },
    mounted() {
        // 页面加载时获取癌症统计数据
        this.fetchData();
    },
    methods: {
        // 获取癌症统计数据
        fetchData() {
            // 发送请求获取数据
            axios.get('/api/cancer-statistics')
                .then(response => {
                    this.cancerStatisticsData = response.data;
                    this.renderChart();
                })
                .catch(error => {
                    console.error('获取癌症数据失败', error);
                });
        },
        // 渲染ECharts图表
        renderChart() {
            const chart = echarts.init(document.getElementById('chart'));
  
            // ECharts 配置项
            const option = {
                title: {
                    text: '癌症发生趋势分析：不同年份的癌症发生数变化',
                    subtext: '数据来源：台湾省卫生福利部',
                    left: 'center',
                    textStyle: {
                        fontSize: 18,
                        fontWeight: 'bold',
                        color: '#333'
                    },
                    subtextStyle: {
                        fontSize: 14,
                        color: '#999'
                    }
                },
                tooltip: {
                    trigger: 'axis',
                    axisPointer: {
                        type: 'shadow',
                    },
                    formatter: function (params) {
                        return `年份: ${params[0].name}<br/>癌症发生数: ${params[0].value}`; // 格式化提示内容
                    }
                },
                xAxis: {
                    type: 'category',
                    data: this.cancerStatisticsData.map(item => item.cancer_diagnosis_year),  // 获取癌症诊断年份
                    name: '癌症诊断年份',
                    axisLable: {
                        formatter: '{value}',  // 控制轴标签的显示格式
                        rotate: 45, // 使年份标签倾斜45度，避免重叠
                        fontSize: 12,
                    },
                    axisLine: {
                        lineStyle: {
                            color: '#ccc',
                        }
                    },
                    axisTick: {
                        show: false,  // 隐藏坐标轴上的刻度线
                    },
                },
                yAxis: {
                    type: 'value',
                    axisLabel: {
                        formatter: '{value}',
                        fontSize: 12,
                    },
                    axisLine: {
                        lineStyle: {
                            color: '#ccc',
                        }
                    },
                    axisTick: {
                        show: false,
                    },
                    splitLine: {
                        show: true,
                        lineStyle: {
                            type: 'dashed',
                            color: '#ddd',  // 使用浅灰色的虚线作为网格线
                        }
                    },
                },
                series: [{
                    data: this.cancerStatisticsData.map(item => item.total_cases),  // 获取汇总后的癌症发生数
                    type: 'bar',  // 使用柱状图
                    barWidth: '40%',
                    itemStyle: {
                        color: '#4CAF50',
                        borderRadius: [5, 5, 0, 0],
                    },
                    emphasis: {
                        focus: 'series', // 鼠标悬停时，强调整个系列
                        itemStyle: {
                            color: '#FF5722',  // 当鼠标悬停时，改变颜色
                        }
                    },
                    label: {
                        show: false,
                    },
                }],
                grid: {
                    left: '10%',
                    right: '10%',
                    bottom: '10%',
                    top: '20%',
                    containLabel: true,  // 确保内容不被遮挡
                }
            };
            // 使用配置项初始化图表
            chart.setOption(option);
        },
    },
};
</script>
  
<style scoped>
#chart {
    margin: 0 auto;
    width: 100%;
    height: 400px;
    background-color: #f9f9f9;
    border-radius: 10px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    padding-top: 20px;
}
</style>