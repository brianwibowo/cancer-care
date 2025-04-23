<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CancerCare</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <!-- Custom CSS -->
    <style>
        :root {
            --sidebar-width: 250px;
        }

        body {
            background-color: #f8f9fa;
            padding-top: 2rem;
            padding-bottom: 2rem;
            display: flex;
            min-height: 100vh;
        }

        /* Fixed Sidebar Styles */
        .sidebar {
            width: var(--sidebar-width);
            background-color: #343a40;
            color: white;
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            height: 100%;
            padding: 0;
            overflow-y: auto;
            z-index: 1000;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }

        .sidebar-brand {
            padding: 20px;
            text-align: center;
            border-bottom: 1px solid #4b545c;
            margin-bottom: 0;
        }

        .sidebar-brand a {
            text-decoration: none;
            color: inherit;
        }

        .sidebar-brand h4 {
            margin: 0;
            color: white;
            font-weight: 600;
        }

        .sidebar-nav {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar-nav li {
            padding: 12px 20px;
            border-bottom: 1px solid #4b545c;
            transition: all 0.2s;
        }

        .sidebar-nav li:hover {
            background-color: #495057;
        }

        .sidebar-nav li a {
            color: #adb5bd;
            text-decoration: none;
            display: flex;
            align-items: center;
            transition: all 0.2s;
        }

        .sidebar-nav li a.active {
            color: white;
            background-color: #495057;
        }

        .sidebar-nav li a i {
            margin-right: 10px;
            font-size: 1.1rem;
        }

        .main-content {
            margin-left: var(--sidebar-width);
            flex: 1;
            padding: 30px;
            min-height: 100vh;
            background-color: #f8f9fa;
        }

        /* App Container Styles */
        .app-container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 2rem;
        }

        .preview-image {
            max-width: 100%;
            border-radius: 10px;
            border: 2px dashed #dee2e6;
            display: none;
            margin-top: 1rem;
        }

        .result-container {
            margin-top: 2rem;
            padding: 1.5rem;
            border-radius: 10px;
            background-color: #f8f9fa;
        }

        .btn-analyze {
            display: none;
            background-color: #0d6efd;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            margin-top: 1rem;
        }

        .upload-area {
            border: 2px dashed #dee2e6;
            border-radius: 10px;
            padding: 2rem;
            text-align: center;
            margin-bottom: 1rem;
            cursor: pointer;
            transition: all 0.3s;
        }

        .upload-area:hover {
            border-color: #0d6efd;
            background-color: #f0f7ff;
        }

        /* Result Styles */
        .result-image-container {
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .result-image {
            max-width: 100%;
            max-height: 300px;
            border-radius: 10px;
            border: 1px solid #ddd;
        }

        .result-actions {
            display: flex;
            justify-content: space-between;
            margin-top: 2rem;
        }

        .pdf-download-btn {
            position: absolute;
            top: 1rem;
            right: 1rem;
        }

        .result-wrapper {
            position: relative;
            padding-top: 3rem;
        }

        @media print {
            body * {
                visibility: hidden;
            }

            #result,
            #result * {
                visibility: visible;
            }

            #result {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
            }

            .pdf-download-btn,
            .result-actions button:first-child {
                display: none;
            }
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-brand">
            <h4><a href="/">CancerCare</a></h4>
        </div>
        <ul class="sidebar-nav">
            <li>
                <a href="/" class="active">
                    <i class="bi bi-camera"></i> AI Detector
                </a>
            </li>
            <li>
                <a href="/dev">
                    <i class="bi bi-code-slash"></i> Developer
                </a>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="container">
            <div class="app-container">
                <h1 class="text-center mb-4">CancerCare: Skin Cancer AI Detector</h1>
                <p class="text-center text-muted mb-4">Upload an image of skin lesion to analyze potential cancer risk
                </p>

                <div class="upload-area" onclick="document.getElementById('imageUpload').click()">
                    <i class="bi bi-cloud-arrow-up fs-1 text-muted mb-3"></i>
                    <p class="mb-2">Click to upload an Image</p>
                    <p class="small text-muted">JPG, PNG (Max 5MB)</p>
                    <input type="file" id="imageUpload" accept="image/*" class="d-none">
                </div>

                <div class="text-center">
                    <img id="preview" class="preview-image" src="#" alt="Preview">
                </div>

                <div class="text-center">
                    <button id="analyzeBtn" class="btn btn-primary btn-analyze" onclick="runPrediction()">
                        <span class="spinner-border spinner-border-sm d-none" id="spinner" role="status"
                            aria-hidden="true"></span>
                        Analyze Image
                    </button>
                </div>

                <div id="result" class="result-container d-none">
                    <div class="result-wrapper">
                        <button id="pdfDownloadBtn" class="btn btn-outline-primary pdf-download-btn">
                            <i class="bi bi-download"></i> Download PDF
                        </button>
                        <h3 class="text-center mb-3">Analysis Results</h3>
                        <div class="result-image-container">
                            <img id="resultImage" class="result-image" src="#" alt="Result">
                        </div>
                        <div id="resultContent"></div>
                        <div class="result-actions">
                            <button onclick="resetUpload()" class="btn btn-outline-secondary">
                                <i class="bi bi-arrow-repeat"></i> Analisis Ulang
                            </button>
                            <button onclick="window.print()" class="btn btn-outline-primary">
                                <i class="bi bi-printer"></i> Cetak Hasil
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- TensorFlow.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@4.2.0/dist/tf.min.js"></script>
    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        const preview = document.getElementById('preview');
        const imageUpload = document.getElementById('imageUpload');
        const resultDiv = document.getElementById("result");
        const resultContent = document.getElementById("resultContent");
        const analyzeBtn = document.getElementById("analyzeBtn");
        const spinner = document.getElementById("spinner");
        const uploadArea = document.querySelector('.upload-area');
        const pdfDownloadBtn = document.getElementById('pdfDownloadBtn');
        const resultImage = document.getElementById('resultImage');

        // Hide analyze button by default
        analyzeBtn.style.display = 'none';

        let model;

        imageUpload.addEventListener('change', function() {
            const file = this.files[0];
            if (!file) return;

            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
                resultImage.src = e.target.result;

                uploadArea.style.display = 'none';
                analyzeBtn.style.display = 'inline-block';
                resultDiv.classList.add('d-none');
            };
            reader.readAsDataURL(file);
        });

        function resetUpload() {
            preview.src = '#';
            preview.style.display = 'none';
            uploadArea.style.display = 'block';
            analyzeBtn.style.display = 'none';
            imageUpload.value = '';
            resultDiv.classList.add('d-none');
            location.reload();
        }

        // Target Classes (from target_classes.js)
        const TARGET_CLASSES = {
            0: 'akiec, Actinic Keratoses (Mirip Kanker Kulit Awal)',
            1: 'bcc, Basal Cell Carcinoma (Kanker Kulit Umum)',
            2: 'bkl, Benign Keratosis (Penebalan Kulit Tidak Berbahaya)',
            3: 'df, Dermatofibroma (Benjolan Jinak pada Kulit)',
            4: 'mel, Melanoma (Kanker Kulit yang Berasal dari Sel Pigmen)',
            5: 'nv, Melanocytic Nevi (Tahi Lalat Biasa)',
            6: 'vasc, Vascular skin lesion (Seperti Tanda Lahir Berwarna Merah)'
        };

        async function runPrediction() {
            if (!imageUpload.files.length) {
                resultContent.innerHTML = '<div class="alert alert-danger">Please upload an image first.</div>';
                resultDiv.classList.remove('d-none');
                return;
            }

            // Show loading state
            analyzeBtn.disabled = true;
            spinner.classList.remove('d-none');
            resultContent.innerHTML =
                '<div class="text-center"><div class="spinner-border text-primary" role="status"></div><p class="mt-2">Analyzing image...</p></div>';
            resultDiv.classList.remove('d-none');

            try {
                // Load model only once
                if (!model) {
                    model = await tf.loadLayersModel('/final_model_kaggle_version1/model.json');
                }

                const tensor = tf.tidy(() => {
                    return tf.browser.fromPixels(preview)
                        .resizeNearestNeighbor([32, 32])
                        .toFloat()
                        .div(tf.scalar(255))
                        .expandDims();
                });

                const prediction = await model.predict(tensor).data();

                const top3 = Array.from(prediction)
                    .map((p, i) => ({
                        classIndex: i,
                        prob: p
                    }))
                    .sort((a, b) => b.prob - a.prob)
                    .slice(0, 3);

                let resultHTML = `
                    <h4 class="mb-3">Top 3 Predictions:</h4>
                    <div class="list-group">
                `;

                top3.forEach(p => {
                    const percentage = (p.prob * 100).toFixed(2);
                    const isHighRisk = p.classIndex === 1 || p.classIndex === 4;

                    resultHTML += `
                        <div class="list-group-item ${isHighRisk ? 'list-group-item-warning' : ''}">
                            <div class="d-flex justify-content-between">
                                <strong>${TARGET_CLASSES[p.classIndex]}</strong>
                                <span>${percentage}%</span>
                            </div>
                            <div class="progress mt-2" style="height: 8px;">
                                <div class="progress-bar ${isHighRisk ? 'bg-danger' : 'bg-success'}" 
                                     role="progressbar" 
                                     style="width: ${percentage}%" 
                                     aria-valuenow="${percentage}" 
                                     aria-valuemin="0" 
                                     aria-valuemax="100">
                                </div>
                            </div>
                        </div>
                    `;
                });

                resultHTML += `</div>`;

                if (top3[0].classIndex === 1 || top3[0].classIndex === 4) {
                    resultHTML += `
                        <div class="alert alert-danger mt-3">
                            <i class="bi bi-exclamation-triangle-fill"></i>
                            <strong>Warning:</strong> This prediction shows potential high-risk skin cancer. 
                            Please consult a dermatologist immediately.
                        </div>
                    `;
                } else {
                    resultHTML += `
                        <div class="alert alert-success mt-3">
                            <i class="bi bi-check-circle-fill"></i>
                            No high-risk cancer detected. However, this is not a medical diagnosis. 
                            Always consult a doctor for professional evaluation.
                        </div>
                    `;
                }

                resultContent.innerHTML = resultHTML;
                // Hide preview image when showing results
                preview.style.display = 'none';

            } catch (error) {
                console.error(error);
                resultContent.innerHTML = `
                    <div class="alert alert-danger">
                        <i class="bi bi-exclamation-octagon-fill"></i>
                        An error occurred: ${error.message}
                    </div>
                `;
            } finally {
                analyzeBtn.disabled = false;
                spinner.classList.add('d-none');
                analyzeBtn.style.display = 'none';
            }
        }

        // Improved PDF Download functionality
        pdfDownloadBtn.addEventListener('click', async function() {
            const script = document.createElement('script');
            script.src = 'https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js';
            script.onload = async function() {
                const {
                    jsPDF
                } = window.jspdf;
                const doc = new jsPDF();

                // Add title
                doc.setFontSize(18);
                doc.setTextColor(40);
                doc.text('Skin Cancer AI Detector - Analysis Results', 105, 15, {
                    align: 'center'
                });

                // Add image
                const imgData = preview.src;
                const imgProps = doc.getImageProperties(imgData);
                const pdfWidth = doc.internal.pageSize.getWidth() - 30;
                const pdfHeight = (imgProps.height * pdfWidth) / imgProps.width;
                doc.addImage(imgData, 'JPEG', 15, 25, pdfWidth, pdfHeight > 100 ? 100 : pdfHeight);

                // Add results
                let yPosition = pdfHeight > 100 ? 140 : 25 + pdfHeight + 15;

                doc.setFontSize(12);
                doc.setTextColor(0);

                // Add prediction results
                doc.setFontSize(14);
                doc.text('Top 3 Predictions:', 15, yPosition);
                yPosition += 10;

                const predictions = Array.from(document.querySelectorAll(
                    '#resultContent .list-group-item'));
                predictions.forEach((item, index) => {
                    if (yPosition > 250) {
                        doc.addPage();
                        yPosition = 20;
                    }

                    const label = item.querySelector('strong').textContent;
                    const percentage = item.querySelector('span').textContent;

                    doc.setFontSize(12);
                    doc.text(`${index + 1}. ${label} - ${percentage}`, 20, yPosition);
                    yPosition += 10;
                });

                // Add warning/note
                const alert = document.querySelector('#resultContent .alert');
                if (alert) {
                    if (yPosition > 250) {
                        doc.addPage();
                        yPosition = 20;
                    }

                    yPosition += 10;
                    doc.setFontSize(12);
                    doc.setTextColor(alert.classList.contains('alert-danger') ? 255 : 0);
                    const alertText = alert.textContent.trim().replace(/\s+/g, ' ');
                    doc.text(alertText, 15, yPosition, {
                        maxWidth: 180
                    });
                }

                // Save PDF
                doc.save('skin_cancer_analysis.pdf');
            };
            document.head.appendChild(script);
        });
    </script>
</body>

</html>
