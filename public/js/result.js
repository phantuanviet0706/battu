document.addEventListener('DOMContentLoaded', () => {
    var master_data = window.LaravelData || {};
    const define_hidden_items = [
        { index: 0, id: "Thiên Tài", name: "Thiên Tài", count: 0, percentage: 0 },
        { index: 1, id: "Tỷ Kiên", name: "Tỷ Kiên", count: 0, percentage: 0 },
        { index: 2, id: "Kiếp Tài", name: "Kiếp Tài", count: 0, percentage: 0 },
        { index: 3, id: "Chính Ấn", name: "Chính Ấn", count: 0, percentage: 0 },
        { index: 4, id: "Thực Thần", name: "Thực Thần", count: 0, percentage: 0 },
        { index: 5, id: "Thương Quan", name: "Thương Quan", count: 0, percentage: 0 },
        { index: 6, id: "Chính Quan", name: "Chính Quan", count: 0, percentage: 0 },
        { index: 7, id: "Thất Sát", name: "Thất Sát", count: 0, percentage: 0 },
        { index: 8, id: "Thiên Ấn", name: "Thiên Ấn", count: 0, percentage: 0 },
        { index: 9, id: "Chính Tài", name: "Chính Tài", count: 0, percentage: 0 }
    ];

    const data_chart = [58, 70, 76, 70, 50, 40, 0, 0, 0, 0];
    if (typeof master_data.calculate_hidden_stems !== 'undefined') {
        define_hidden_items.forEach(item => {
            if (master_data.calculate_hidden_stems[item.id]) {
                item.count = master_data.calculate_hidden_stems[item.id];
                item.percentage = Number((item.count / define_hidden_items.length * 100).toFixed(2));
                data_chart[item.index] = item.percentage;
            } else {
                data_chart[item.index] = 0; // Nếu không có dữ liệu, đặt về 0
            }
        });

    }
    console.log(data_chart);

    Chart.register(ChartDataLabels);

    // Dữ liệu cho biểu đồ Ngũ Hành tương quan (Pie Chart)
    const nguHanhData = {
        labels: ['Mộc', 'Hỏa', 'Thủy', 'Thổ', 'Kim'],
        datasets: [{
            data: [4.08, 9.18, 22.45, 18.37, 45.92], // Đã điều chỉnh để tổng là 100%
            backgroundColor: [
                '#4CAF50', // Mộc (Green)
                '#F44336', // Hỏa (Red)
                '#2196F3', // Thủy (Blue)
                '#FFC107', // Thổ (Yellow)
                '#673AB7' // Kim (Purple)
            ],
            hoverOffset: 4
        }]
    };

    const nguHanhConfig = {
        type: 'pie',
        data: nguHanhData,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false // Ẩn chú giải mặc định
                },
                tooltip: {
                    callbacks: {
                        label: function (context) {
                            let label = context.label || '';
                            if (label) {
                                label += ': ';
                            }
                            if (context.parsed !== null) {
                                label += context.parsed.toFixed(2) + '%';
                            }
                            return label;
                        }
                    }
                },
                datalabels: {
                    color: '#fff', // Màu chữ
                    formatter: (value, context) => {
                        // Lấy tổng giá trị của tất cả các lát cắt
                        const sum = context.chart.data.datasets[0].data.reduce((a, b) => a + b, 0);
                        const percentage = (value / sum * 100).toFixed(1) + '%'; // Tính phần trăm
                        return percentage;
                    },
                    font: {
                        weight: 'bold',
                        size: 14 // Kích thước chữ
                    },
                    // Điều chỉnh vị trí nhãn để tránh trùng lặp
                    anchor: 'end', // "start", "center", "end"
                    align: 'start', // "start", "center", "end"
                    offset: 10, // Khoảng cách từ viền lát cắt
                    borderRadius: 4,
                    backgroundColor: (context) => context.dataset.backgroundColor[context.dataIndex], // Màu nền theo màu lát cắt
                    padding: {
                        top: 6,
                        bottom: 6,
                        left: 8,
                        right: 8
                    }
                }
            }
        },
        plugins: [ChartDataLabels]
    };

    const nguHanhChart = new Chart(
        document.getElementById('nguHanhChart'),
        nguHanhConfig
    );

    // Plugin tùy chỉnh để hiển thị phần trăm bên trong thanh
    const percentageInBarPlugin = {
        id: 'percentageInBar',
        afterDatasetDraw(chart, args, options) {
            const {
                ctx,
                chartArea: {
                    left,
                    right,
                    top,
                    bottom,
                    width,
                    height
                },
                scales: {
                    x,
                    y
                }
            } = chart;
            ctx.save();

            args.meta.data.forEach((bar, index) => {
                const value = chart.data.datasets[0].data[index];
                const percentage = value.toFixed(0) + '%'; // Lấy phần trăm và làm tròn

                const xPos = bar.x;
                const yPos = bar.y;
                const barWidth = bar.width;

                ctx.fillStyle = 'white'; // Màu chữ
                ctx.textAlign = 'right'; // Căn chữ sang phải
                ctx.textBaseline = 'middle'; // Căn giữa theo chiều dọc
                ctx.font = 'bold 12px Inter, sans-serif'; // Font chữ

                let textX = xPos - 5; // Dịch sang trái 5px từ mép phải của thanh
                let textY = yPos;

                // Đảm bảo chữ không bị tràn ra ngoài thanh nếu thanh quá ngắn
                if (barWidth < ctx.measureText(percentage).width + 10) {
                    ctx.fillStyle = 'black'; // Đổi màu chữ sang đen
                    ctx.textAlign = 'left'; // Căn chữ sang trái
                    textX = xPos + 5; // Vẽ ở bên ngoài thanh
                }

                ctx.fillText(percentage, textX, textY);
            });
            ctx.restore();
        }
    };

    // Dữ liệu cho biểu đồ Ngũ Hành Thập Thần (Horizontal Bar Chart)
    const thapThanData = {
        labels: [
            'Thiên Tài', 'Tỷ Kiên', 'Kiếp Tài', 'Chính Ấn', 'Thực Thần',
            'Thương Quan', 'Chính Quan', 'Thất Sát', 'Thiên Ấn', 'Chính Tài'
        ],
        datasets: [{
            label: 'Phần trăm',
            data: data_chart,
            backgroundColor: [
                '#4CAF50', // Màu xanh lá cây (Mộc - Thiên Tài)
                '#9E9E9E', // Màu xám (Kim - Tỷ Kiên)
                '#757575', // Màu xám đậm (Kim - Kiếp Tải)
                '#FFC107', // Màu vàng (Thổ - Chính Ấn)
                '#2196F3', // Màu xanh dương (Thủy - Thực Thần)
                '#1976D2', // Màu xanh dương đậm (Thủy - Thương Quan)
                '#F44336', // Màu đỏ (Hỏa - Chính Quan)
                '#D32F2F', // Màu đỏ đậm (Hỏa - Thất Sát)
                '#689F38', // Màu xanh lá cây đậm (Mộc - Thiên Ấn)
                '#8BC34A' // Màu xanh lá cây nhạt (Mộc - Chính Tài)
            ],
            borderColor: [
                '#4CAF50',
                '#9E9E9E',
                '#757575',
                '#FFC107',
                '#2196F3',
                '#1976D2',
                '#F44336',
                '#D32F2F',
                '#689F38',
                '#8BC34A'
            ],
            borderWidth: 1,
            borderRadius: 5, // Bo tròn góc của thanh
            barThickness: 15 // Độ dày của thanh
        }]
    };

    const thapThanConfig = {
        type: 'bar',
        data: thapThanData,
        options: {
            indexAxis: 'y', // Biểu đồ thanh ngang
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false // Ẩn chú giải
                },
                tooltip: {
                    enabled: false // Tắt tooltip mặc định để dùng plugin tùy chỉnh
                },
                percentageInBar: {} // Kích hoạt plugin
            },
            scales: {
                x: {
                    beginAtZero: true,
                    max: 100, // Đặt giới hạn tối đa là 100%
                    ticks: {
                        display: false // Ẩn nhãn trục X
                    },
                    grid: {
                        display: false // Ẩn đường lưới trục X
                    }
                },
                y: {
                    grid: {
                        display: false // Ẩn đường lưới ngang
                    },
                    ticks: {
                        color: 'black', // Màu chữ nhãn
                        font: {
                            size: 12,
                            weight: 'bold'
                        },
                        align: 'start', // Căn trái nhãn trục Y
                        padding: 10 // Thêm padding để nhãn không quá sát mép
                    }
                }
            }
        },
        plugins: [percentageInBarPlugin] // Đăng ký plugin
    };

    const thapThanChart = new Chart(
        document.getElementById('thapThanChart'),
        thapThanConfig
    );

    // --- Logic cho Ngũ Hành phân phối (mũi tên) ---
    const nguhanhElements = {
        Moc: {
            el: document.querySelector('[data-element="Moc"]'),
            color: '#4CAF50',
            x: 0,
            y: 0
        },
        Hoa: {
            el: document.querySelector('[data-element="Hoa"]'),
            color: '#F44336',
            x: 0,
            y: 0
        },
        Tho: {
            el: document.querySelector('[data-element="Tho"]'),
            color: '#FFC107',
            x: 0,
            y: 0
        },
        Kim: {
            el: document.querySelector('[data-element="Kim"]'),
            color: '#9E9E9E',
            x: 0,
            y: 0
        },
        Thuy: {
            el: document.querySelector('[data-element="Thuy"]'),
            color: '#2196F3',
            x: 0,
            y: 0
        }
    };

    const nguhanhContainer = document.querySelector('.nguhanh-container');
    const svgArrows = nguhanhContainer.querySelector('svg');
    const containerSize = 250; // Kích thước viewBox của SVG
    const elementRadius = 22.5; // Bán kính của mỗi yếu tố (45px/2)
    const pentagonCircumradius = 100; // Bán kính của đường tròn đi qua tâm các yếu tố (tăng để phù hợp với Âm Dương lớn hơn)
    const centerX = containerSize / 2;
    const centerY = containerSize / 2;
    const arrowHeadLength = 10; // Chiều dài của đầu mũi tên

    // Hàm tính toán vị trí tâm của yếu tố trên đường tròn ngũ giác
    function calculateElementPosition(angleDegrees) {
        const angleRadians = (angleDegrees - 90) * Math.PI / 180.0; // -90 để Mộc ở trên cùng
        return {
            x: centerX + pentagonCircumradius * Math.cos(angleRadians),
            y: centerY + pentagonCircumradius * Math.sin(angleRadians)
        };
    }

    // Đặt vị trí cho các yếu tố và lưu tâm của chúng
    const positions = {
        Moc: calculateElementPosition(0), // Top
        Hoa: calculateElementPosition(72), // Top-right
        Tho: calculateElementPosition(144), // Bottom-right
        Kim: calculateElementPosition(216), // Bottom-left
        Thuy: calculateElementPosition(288) // Top-left
    };

    // Gán vị trí cho các phần tử HTML và lưu tâm
    for (const key in nguhanhElements) {
        const pos = positions[key];
        nguhanhElements[key].el.style.left = `${(pos.x / containerSize) * 100}%`;
        nguhanhElements[key].el.style.top = `${(pos.y / containerSize) * 100}%`;
        nguhanhElements[key].x = pos.x;
        nguhanhElements[key].y = pos.y;
    }

    // Hàm tính điểm trên viền của một hình tròn hướng về một điểm khác
    function getPointOnCircleEdgeTowards(cx, cy, targetX, targetY, radius) {
        const angle = Math.atan2(targetY - cy, targetX - cx);
        return {
            x: cx + radius * Math.cos(angle),
            y: cy + radius * Math.sin(angle)
        };
    }

    // Vẽ các mũi tên theo chu trình tương sinh
    const flowOrder = ['Moc', 'Hoa', 'Tho', 'Kim', 'Thuy', 'Moc']; // Chu trình tương sinh

    // Xóa các mũi tên cũ trước khi vẽ lại
    svgArrows.innerHTML = `
                <defs>
                    <marker id="arrowhead" markerWidth="10" markerHeight="7" refX="0" refY="3.5" orient="auto">
                        <polygon points="0 0, 10 3.5, 0 7" fill="currentColor" />
                    </marker>
                </defs>
            `;

    for (let i = 0; i < flowOrder.length - 1; i++) {
        const startElement = nguhanhElements[flowOrder[i]];
        const endElement = nguhanhElements[flowOrder[i + 1]];

        // Điểm trên viền của yếu tố bắt đầu, hướng về yếu tố kết thúc
        const startPoint = getPointOnCircleEdgeTowards(startElement.x, startElement.y, endElement.x, endElement.y, elementRadius);

        // Điểm trên viền của yếu tố kết thúc, hướng về yếu tố bắt đầu (để mũi tên không đi vào trong)
        const endPointForArrowTip = getPointOnCircleEdgeTowards(endElement.x, endElement.y, startElement.x, startElement.y, elementRadius);

        // Tính toán điểm cuối thực sự của đường thẳng để mũi tên không bị cắt
        // Di chuyển điểm cuối lùi lại một chút từ endPointForArrowTip bằng chiều dài đầu mũi tên
        const dx = endPointForArrowTip.x - startPoint.x;
        const dy = endPointForArrowTip.y - startPoint.y;
        const distance = Math.sqrt(dx * dx + dy * dy);

        let actualLineEndX = endPointForArrowTip.x;
        let actualLineEndY = endPointForArrowTip.y;

        if (distance > arrowHeadLength) {
            const unitDx = dx / distance;
            const unitDy = dy / distance;
            actualLineEndX = endPointForArrowTip.x - unitDx * arrowHeadLength;
            actualLineEndY = endPointForArrowTip.y - unitDy * arrowHeadLength;
        } else {
            actualLineEndX = startPoint.x + dx / 2;
            actualLineEndY = startPoint.y + dy / 2;
        }


        const path = document.createElementNS("http://www.w3.org/2000/svg", "line");
        path.setAttribute("x1", startPoint.x);
        path.setAttribute("y1", startPoint.y);
        path.setAttribute("x2", actualLineEndX);
        path.setAttribute("y2", actualLineEndY);
        path.setAttribute("stroke", "rgba(107, 114, 128, 0.7)"); // text-gray-400 opacity-70
        path.setAttribute("stroke-width", "1.5"); // Giảm độ dày cho thanh thoát
        path.setAttribute("marker-end", "url(#arrowhead)"); // Thêm đầu mũi tên

        svgArrows.appendChild(path);
    }

    // Get chart dụng thần
    // Dữ liệu cho biểu đồ Ngũ Hành tương quan (Pie Chart)
    const nguHanhData1 = {
        labels: ['Mộc', 'Hỏa', 'Thủy', 'Thổ', 'Kim'],
        datasets: [{
            data: [4.08, 9.18, 22.45, 18.37, 45.92], // Đã điều chỉnh để tổng là 100%
            backgroundColor: [
                '#7CB342', // Màu cho 9% (Mộc)
                '#D9534F', // Màu cho 18% (Hỏa)
                '#337AB7', // Màu cho 27% (Thủy)
                '#4A201B', // Màu cho 32%
                '#F0AD4E', // Màu cho 14% (Kim)
            ],
            hoverOffset: 4
        }]
    };
    const ctx = document.getElementById('nguHanhChart1').getContext('2d');
    const nguHanhChart1 = new Chart(ctx, {
        type: 'pie',
        data: nguHanhData1,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false // Ẩn chú giải mặc định
                },
                tooltip: {
                    callbacks: {
                        label: function (context) {
                            let label = context.label || '';
                            if (label) {
                                label += ': ';
                            }
                            if (context.parsed !== null) {
                                label += context.parsed.toFixed(2) + '%';
                            }
                            return label;
                        }
                    }
                },
                datalabels: {
                    color: '#fff', // Màu chữ
                    formatter: (value, context) => {
                        // Lấy tổng giá trị của tất cả các lát cắt
                        const sum = context.chart.data.datasets[0].data.reduce((a, b) => a + b, 0);
                        const percentage = (value / sum * 100).toFixed(1) + '%'; // Tính phần trăm
                        return percentage;
                    },
                    font: {
                        weight: 'bold',
                        size: 14 // Kích thước chữ
                    },
                    // Điều chỉnh vị trí nhãn để tránh trùng lặp
                    anchor: 'end', // "start", "center", "end"
                    align: 'start', // "start", "center", "end"
                    offset: 10, // Khoảng cách từ viền lát cắt
                    borderRadius: 4,
                    backgroundColor: (context) => context.dataset.backgroundColor[context.dataIndex], // Màu nền theo màu lát cắt
                    padding: {
                        top: 6,
                        bottom: 6,
                        left: 8,
                        right: 8
                    }
                }
            }
        },
        plugins: [ChartDataLabels]
    });
});