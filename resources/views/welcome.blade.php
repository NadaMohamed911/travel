<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>نظام إدارة الحجوزات والرحلات | Travel Agency</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #333;
        }
        .card {
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.2);
            text-align: center;
            max-width: 500px;
            width: 90%;
        }
        h1 {
            color: #1e3c72;
            margin-bottom: 15px;
            font-size: 28px;
        }
        p {
            color: #666;
            font-size: 16px;
            line-height: 1.6;
        }
        .btn {
            display: inline-block;
            background: #ff6b6b;
            color: white;
            padding: 12px 35px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: bold;
            margin-top: 25px;
            transition: 0.3s;
            box-shadow: 0 5px 15px rgba(255, 107, 107, 0.4);
        }
        .btn:hover {
            background: #ee5253;
            transform: translateY(-2px);
        }
    </style>
</head>






<body>

    <div class="card">
        <h1>Travel Agency Portal ✈️</h1>
        <p>نظام الإدارة الذكي لتنظيم الرحلات السياحية، إدارة الحجوزات، وتنسيق الأسطول والسيارات الخاصة بالوكالة.</p>
       <a href="{{ route('login') }}">لوحة التحكم الإدارية</a>

    </div>


    
</body>
</html>