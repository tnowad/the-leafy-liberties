<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="/dist/output.css" />
  <title>Document</title>
</head>

<body>

  <?php include 'views/layouts/default/header.php' ?>
  <?php include 'views/pages/productDetail.php' ?>
  <?php include 'views/layouts/default/footer.php' ?>

</body>

<script>
  theme: {
    screens: {
      mobile: '470px',
        sm: '576px',
          md: '768px',
            lg: '992px',
              xl: '1200px',
                '2xl': '1440px',
    },
    extend: {
      colors: {
        primary: '#315854',
          'primary-100': '#eff6f5',
            'primary-200': '#cee4e1',
              'primary-300': '#add1ce',
                'primary-400': '#8cbfba',
                  'primary-500': '#6cada6',
                    'primary-600': '#52938d',
                      'primary-700': '#40736d',
                        'primary-800': '#2e524e',
                          'primary-900': '#1b312f',
      },
      gridTemplateRows: {
        'popular-books': 'repeat(2, 420px)',
      },
      gridTemplateColumns: {
        'popular-books': 'repeat(4, minmax(0,250px))',
          'mdpopular-books': 'repeat(3, minmax(0,400px))',
            'smpopular-books': 'repeat(2, 285px)',
              'mobilepopular-books': 'repeat(2, 240px)',

                'auto' : 'auto auto',
      },
    },
  },
</script>

</html>
