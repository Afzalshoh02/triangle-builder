<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Triangle Builder</title>
    <style>
        :root {
            --primary-color: #4a90e2;
            --success-color: #2ecc71;
            --error-color: #e74c3c;
            --background-color: #f5f7fa;
        }

        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background-color: var(--background-color);
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
            margin: 20px;
        }

        h1 {
            color: var(--primary-color);
            text-align: center;
            margin-bottom: 2rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        input[type="number"] {
            width: 100%;
            padding: 0.8rem;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }

        input[type="number"]:focus {
            outline: none;
            border-color: var(--primary-color);
        }

        button {
            width: 100%;
            padding: 0.8rem;
            background: var(--primary-color);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        button:hover {
            background: #357abd;
        }

        .result {
            margin-top: 2rem;
            padding: 1rem;
            border-radius: 8px;
            text-align: center;
            font-family: 'Courier New', Courier, monospace;
        }

        .success {
            background: rgba(46, 204, 113, 0.1);
            color: var(--success-color);
        }

        .error {
            background: rgba(231, 76, 60, 0.1);
            color: var(--error-color);
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Triangle Builder</h1>

    <form method="GET" action="{{ route('triangle') }}">
        <div class="form-group">
            <input
                type="number"
                name="number"
                min="1"
                placeholder="Введите количество элементов"
                value="{{ request('number') }}"
                required
            >
        </div>
        <button type="submit">Построить треугольник</button>
    </form>

    @if ($result)
        <div class="result success">
            @foreach ($result as $row)
                <div>{{ $row }}</div>
            @endforeach
        </div>
    @elseif ($error)
        <div class="result error">
            {{ $error }}
        </div>
    @endif
</div>
</body>
</html>
