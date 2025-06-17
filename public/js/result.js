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
    let data_ngu_hanh = master_data.calculated_percentage_data;
    const data_labels = ['Mộc', 'Hỏa', 'Thủy', 'Thổ', 'Kim'];
    let sorted_data = [];
    data_labels.forEach(key => {
        if (data_ngu_hanh.hasOwnProperty(key)) {
            sorted_data.push(data_ngu_hanh[key]);
        }
    });

    const nguHanhData = {
        labels: data_labels,
        datasets: [{
            data: sorted_data, // Đã điều chỉnh để tổng là 100%
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
        afterDatasetsDraw(chart, args, options) {
            const { ctx, chartArea: { left, right, top, bottom, width, height }, scales: { x, y } } = chart;

            ctx.save();

            chart.data.datasets.forEach((dataset, datasetIndex) => {
                const meta = chart.getDatasetMeta(datasetIndex);
                if (!meta.hidden) {
                    meta.data.forEach((bar, index) => {
                        const value = dataset.data[index];
                        // Chỉ hiển thị nhãn nếu giá trị lớn hơn 0
                        if (value > 0) {
                            const barX = bar.x;
                            const barY = bar.y;
                            const barWidth = bar.width; // Chiều rộng của thanh ngang
                            const barHeight = bar.height; // Chiều cao của thanh ngang

                            // Tính toán phần trăm
                            const total = x.max; // Giới hạn tối đa của trục X là 100
                            const percentage = ((value / total) * 100).toFixed(0) + '%'; // Làm tròn và thêm %

                            // Cài đặt font và màu chữ
                            ctx.fillStyle = 'white'; // Màu chữ trắng cho dễ nhìn trên nền màu thanh
                            ctx.font = 'bold 12px Arial'; // Font và kích thước chữ
                            ctx.textAlign = 'center'; // Căn giữa chữ theo chiều ngang
                            ctx.textBaseline = 'middle'; // Căn giữa chữ theo chiều dọc

                            // Tính toán vị trí chữ
                            // Đặt chữ ở giữa thanh bar
                            const textX = barX - (barWidth / 2); // Vị trí X của chữ (ở giữa thanh)
                            const textY = barY; // Vị trí Y của chữ (ở giữa thanh)

                            // Vẽ chữ
                            ctx.fillText(percentage, textX, textY);
                        }
                    });
                }
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
                // Không cần percentageInBar: {} ở đây nữa, vì plugin đã được đăng ký ở cấp độ Chart toàn cục
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
        plugins: [percentageInBarPlugin] // Đăng ký plugin ở đây
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

    // Dữ liệu cho biểu đồ Ngũ hành đối ứng (Pie Chart)
    let data_elements_interrelation = master_data.calculated_elements_interrelation;
    const data_labels_elements_interrelation = ['Mộc', 'Hỏa', 'Thủy', 'Thổ', 'Kim'];
    let sorted_data_elements_interrelation = [];
    data_labels_elements_interrelation.forEach(key => {
        if (data_elements_interrelation.hasOwnProperty(key)) {
            sorted_data_elements_interrelation.push(data_elements_interrelation[key]);
        }
    });

    // Get chart dụng thần
    // Dữ liệu cho biểu đồ Ngũ Hành tương quan (Pie Chart)
    const nguHanhData1 = {
        labels: data_labels_elements_interrelation,
        datasets: [{
            data: sorted_data_elements_interrelation, // Đã điều chỉnh để tổng là 100%
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


    // Export trang thành ảnh
    const exportLaSoButton = document.getElementById('exportLaSoBtn');

    exportLaSoButton.addEventListener('click', function() {
        // Chọn phần tử mà bạn muốn chụp.
        // Nếu muốn chụp toàn bộ trang (từ đầu đến cuối), bạn có thể chọn document.body hoặc một div chứa toàn bộ nội dung chính.
        // Giả sử bạn có một div bao bọc toàn bộ nội dung trang với id="full-page-content"
        const elementToCapture = document.getElementById('lasotuvi');
        // const elementToCapture = document.body;

        if (!elementToCapture) {
            console.error('Không tìm thấy phần tử để chụp. Đảm bảo id "full-page-content" hoặc document.body tồn tại.');
            return;
        }

        // Tạm thời ẩn nút export để nó không xuất hiện trong ảnh chụp
        exportLaSoButton.style.display = 'none';

        html2canvas(elementToCapture, {
            // Cấu hình quan trọng để chụp toàn bộ trang, bao gồm cả phần đã cuộn xuống
            scrollX: -window.scrollX,
            scrollY: -window.scrollY,
            windowWidth: document.documentElement.offsetWidth,
            windowHeight: document.documentElement.offsetHeight,
            useCORS: true, // Rất quan trọng nếu bạn có hình ảnh từ các nguồn khác (CDN, domain khác)
                            // Đảm bảo các nguồn này có CORS header thích hợp.
            logging: true, // Bật logging để debug nếu có vấn đề
            allowTaint: false, // Ngăn chặn việc 'taint' canvas nếu có hình ảnh cross-origin không có CORS.
                                // Nếu useCORS: true mà vẫn không hoạt động, hãy thử đặt allowTaint: true (nhưng điều này sẽ khiến canvas bị "tainted" và bạn không thể dùng toDataURL)
                                // Tốt nhất là đảm bảo CORS đúng.
            scale: 2 // Tăng scale lên 2 để ảnh chụp có chất lượng cao hơn (2x pixels)
        }).then(canvas => {
            // Hiển thị lại nút export sau khi chụp xong
            exportLaSoButton.style.display = 'block';

            // Chuyển canvas thành URL dữ liệu ảnh PNG
            const imageData = canvas.toDataURL('image/png');

            // Tạo một thẻ <a> ẩn để tải xuống ảnh
            const link = document.createElement('a');
            link.href = imageData;
            link.download = 'giao_dien_webpage.png'; // Tên file khi tải về

            // Thêm link vào DOM, click tự động, sau đó xóa link
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);

            alert('Giao diện đã được xuất thành công!');
        }).catch(error => {
            exportLaSoButton.style.display = 'block'; // Đảm bảo nút hiện lại ngay cả khi có lỗi
            console.error('Lỗi khi xuất ảnh:', error);
            alert('Có lỗi xảy ra khi xuất ảnh. Vui lòng thử lại hoặc liên hệ hỗ trợ.');
        });
    });

    
    const exportDungThanButton = document.getElementById('exportDungThanBtn');

    exportDungThanButton.addEventListener('click', function() {
        // Chọn phần tử mà bạn muốn chụp.
        // Nếu muốn chụp toàn bộ trang (từ đầu đến cuối), bạn có thể chọn document.body hoặc một div chứa toàn bộ nội dung chính.
        // Giả sử bạn có một div bao bọc toàn bộ nội dung trang với id="full-page-content"
        const elementToCapture = document.getElementById('dungthan');
        // const elementToCapture = document.body;

        if (!elementToCapture) {
            console.error('Không tìm thấy phần tử để chụp. Đảm bảo id "full-page-content" hoặc document.body tồn tại.');
            return;
        }

        // Tạm thời ẩn nút export để nó không xuất hiện trong ảnh chụp
        exportDungThanButton.style.display = 'none';

        html2canvas(elementToCapture, {
            // Cấu hình quan trọng để chụp toàn bộ trang, bao gồm cả phần đã cuộn xuống
            scrollX: -window.scrollX,
            scrollY: -window.scrollY,
            windowWidth: document.documentElement.offsetWidth,
            windowHeight: document.documentElement.offsetHeight,
            useCORS: true, // Rất quan trọng nếu bạn có hình ảnh từ các nguồn khác (CDN, domain khác)
                            // Đảm bảo các nguồn này có CORS header thích hợp.
            logging: true, // Bật logging để debug nếu có vấn đề
            allowTaint: false, // Ngăn chặn việc 'taint' canvas nếu có hình ảnh cross-origin không có CORS.
                                // Nếu useCORS: true mà vẫn không hoạt động, hãy thử đặt allowTaint: true (nhưng điều này sẽ khiến canvas bị "tainted" và bạn không thể dùng toDataURL)
                                // Tốt nhất là đảm bảo CORS đúng.
            scale: 2 // Tăng scale lên 2 để ảnh chụp có chất lượng cao hơn (2x pixels)
        }).then(canvas => {
            // Hiển thị lại nút export sau khi chụp xong
            exportDungThanButton.style.display = 'block';

            // Chuyển canvas thành URL dữ liệu ảnh PNG
            const imageData = canvas.toDataURL('image/png');

            // Tạo một thẻ <a> ẩn để tải xuống ảnh
            const link = document.createElement('a');
            link.href = imageData;
            link.download = 'giao_dien_webpage.png'; // Tên file khi tải về

            // Thêm link vào DOM, click tự động, sau đó xóa link
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);

            alert('Giao diện đã được xuất thành công!');
        }).catch(error => {
            exportDungThanButton.style.display = 'block'; // Đảm bảo nút hiện lại ngay cả khi có lỗi
            console.error('Lỗi khi xuất ảnh:', error);
            alert('Có lỗi xảy ra khi xuất ảnh. Vui lòng thử lại hoặc liên hệ hỗ trợ.');
        });
    });
});