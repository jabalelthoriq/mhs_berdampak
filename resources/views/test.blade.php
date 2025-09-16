<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hi, Alyssa</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Arial, sans-serif;
            background: linear-gradient(135deg, #f5f3ff, #e0e7ff);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .card {
            background: linear-gradient(135deg, #e9d5ff, #ddd6fe);
            border-radius: 24px;
            padding: 40px 50px;
            width: 100%;
            max-width: 600px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(139, 92, 246, 0.15);
        }

        .decorative-dots {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            pointer-events: none;
        }

        .dot {
            position: absolute;
            border-radius: 50%;
            opacity: 0.6;
        }

        .dot-1 {
            width: 12px;
            height: 12px;
            background: #8b5cf6;
            top: 20px;
            right: 80px;
        }

        .dot-2 {
            width: 8px;
            height: 8px;
            background: #6366f1;
            top: 50px;
            right: 50px;
        }

        .dot-3 {
            width: 6px;
            height: 6px;
            background: #a855f7;
            bottom: 60px;
            left: 60px;
        }

        .dot-4 {
            width: 10px;
            height: 10px;
            background: #7c3aed;
            bottom: 100px;
            left: 40px;
        }

        .content {
            position: relative;
            z-index: 1;
            display: flex;
            align-items: center;
            gap: 40px;
        }

        .text-section {
            flex: 1;
        }

        .greeting {
            font-size: 42px;
            font-weight: 700;
            color: #374151;
            margin-bottom: 16px;
            letter-spacing: -0.5px;
        }

        .message {
            font-size: 18px;
            color: #6b7280;
            line-height: 1.6;
            font-weight: 400;
        }

        .illustration {
            flex-shrink: 0;
            position: relative;
        }

        .person {
            width: 180px;
            height: 180px;
            position: relative;
        }

        .chair {
            position: absolute;
            bottom: -10px;
            left: 20px;
            width: 140px;
            height: 80px;
            background: linear-gradient(145deg, #7c3aed, #6d28d9);
            border-radius: 15px 15px 8px 8px;
        }

        .chair::before {
            content: '';
            position: absolute;
            top: -60px;
            left: 10px;
            width: 120px;
            height: 70px;
            background: linear-gradient(145deg, #8b5cf6, #7c3aed);
            border-radius: 12px 12px 0 0;
        }

        .desk {
            position: absolute;
            bottom: -20px;
            left: 0;
            width: 180px;
            height: 12px;
            background: linear-gradient(90deg, #e5e7eb, #d1d5db);
            border-radius: 6px;
        }

        .laptop {
            position: absolute;
            bottom: 15px;
            right: 10px;
            width: 70px;
            height: 45px;
            background: linear-gradient(145deg, #6d28d9, #5b21b6);
            border-radius: 6px;
            transform: perspective(100px) rotateX(15deg);
        }

        .laptop::before {
            content: '';
            position: absolute;
            top: -35px;
            left: 0;
            width: 70px;
            height: 35px;
            background: linear-gradient(145deg, #4c1d95, #3730a3);
            border-radius: 6px 6px 0 0;
        }

        .person-body {
            position: absolute;
            bottom: 30px;
            left: 40px;
            width: 60px;
            height: 80px;
            background: linear-gradient(145deg, #fbbf24, #f59e0b);
            border-radius: 20px 20px 0 0;
        }

        .person-head {
            position: absolute;
            top: 10px;
            left: 50px;
            width: 40px;
            height: 40px;
            background: #fef3c7;
            border-radius: 50%;
        }

        .hair {
            position: absolute;
            top: 5px;
            left: 45px;
            width: 50px;
            height: 35px;
            background: linear-gradient(145deg, #5b21b6, #4c1d95);
            border-radius: 25px 25px 15px 15px;
        }

        .hair::before {
            content: '';
            position: absolute;
            right: -10px;
            top: 5px;
            width: 25px;
            height: 40px;
            background: linear-gradient(145deg, #5b21b6, #4c1d95);
            border-radius: 0 15px 15px 0;
        }

        .coffee {
            position: absolute;
            bottom: 50px;
            left: 10px;
            width: 16px;
            height: 20px;
            background: #f3f4f6;
            border-radius: 0 0 8px 8px;
        }

        .coffee::before {
            content: '';
            position: absolute;
            right: -4px;
            top: 5px;
            width: 6px;
            height: 8px;
            border: 2px solid #d1d5db;
            border-left: none;
            border-radius: 0 4px 4px 0;
        }

        @media (max-width: 640px) {
            .card {
                padding: 30px 25px;
            }

            .content {
                flex-direction: column;
                text-align: center;
                gap: 30px;
            }

            .greeting {
                font-size: 36px;
            }

            .message {
                font-size: 16px;
            }

            .person {
                width: 160px;
                height: 160px;
            }

            .desk {
                width: 160px;
            }
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="decorative-dots">
            <div class="dot dot-1"></div>
            <div class="dot dot-2"></div>
            <div class="dot dot-3"></div>
            <div class="dot dot-4"></div>
        </div>

        <div class="content">
            <div class="text-section">
                <h1 class="greeting">Hi, Alyssa</h1>
                <p class="message">Ready to start your day with some pitch decks?</p>
            </div>

            <div class="illustration">
                <div class="person">
                    <div class="desk"></div>
                    <div class="chair"></div>
                    <div class="laptop"></div>
                    <div class="person-body"></div>
                    <div class="person-head"></div>
                    <div class="hair"></div>
                    <div class="coffee"></div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
