<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="images/favicon.ico" />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        screens: {
                           sm: '490px',
                           md: '768px',
                           lg: '976px',
                           xl: '1440px' 
                        }
                        colors: {
                            laravel: "#ef3b2d",
                        },
                    },
                },
            };
        </script>
    <title>Book A Book</title>
</head>
<body class="bg-black">
    <main>
        {{-- View Output --}}
        {{ $slot }}
    </main>
    <x-flash-message />
</body>
</html>