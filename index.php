<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Portal Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
    min-height: 100vh;
    margin: 0;
    font-family: Arial, sans-serif;

    display: flex;
    justify-content: center;
    align-items: center;

    position: relative;
    overflow: hidden;
}

/* Background layer */
body::before {
    content: "";
    position: absolute;
    inset: 0;

    background-image: url("assets/1745910107PVP_1089.webp");
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;

    filter: blur(6px);           /* adjust blur */
    transform: scale(1.05);      /* avoids blur edges */
    z-index: -1;
}



        .login-card {
            width: 450px;
            padding: 50px;
            border-radius: 15px;
            background: rgba(233, 230, 230, 0.6);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            /* backdrop-filter: blur(10px); */
            color: #121212ff;
        }

        .form-control {
            background: transparent;
            color: #111010ff;
            border: 2px solid #06060680;
        }

        .form-control::placeholder {
            color: #4545459e;
        }

        .login-btn {
            width: 100%;
            border-radius: 25px;
        }

        a {
            color: #0f0d0dff;
            text-decoration: none;
        }
        .btn {
                background-color: #1a4309ff;
                color: #fff;
                border: none;
            }
        .college-logo {
            width: 75px;          /* small logo */
            height: auto;
        }

        .college-name {
            font-size: 1.20rem;
            font-weight: 700;
            letter-spacing: 0.4px;
        }

        .college-place {
            font-size: 0.9rem;
            color: #555;
        }

        @media (max-width: 576px) {
            .login-card {
                width: 100%;
                padding: 30px;
            }
        }

        @media (max-width: 350px) {
            body {
                padding: 10px;
            }
            .login-card {
                padding: 20px;
            }
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]');
    popoverTriggerList.forEach(function (el) {
        new bootstrap.Popover(el);
    });
});
</script>

</head>

<body>

    <div class="login-card card">

    <div class="college-header mb-4">

        <div class="college-top d-flex align-items-center mb-3">

    <div class="flex-shrink-0">
        <img src="assets/college-logo.png"
             alt="Aiman College Logo"
             class="college-logo">
    </div>

    <div class="flex-grow-1 ms-3">
        <p class="college-name mb-0">
            AIMAN COLLEGE OF ARTS AND SCIENCE
        </p>
        <p class="college-place mb-0">
            Tiruchirappalli, Tamil Nadu 620021
        </p>
    </div>

</div>


    <h3 class="text-center mb-4 fw-bold fs-1"
    style="color:#1a4309ff; padding:10px; border-radius:8px;">
    Login
    </h3>


        <form>
            <div class="mb-3">
                <label>Roll No./Registration no.</label>
                <input type="varchar" class="form-control" placeholder="Enter email">
            </div>

            <div class="mb-3">
    <label class="form-label">
        Password
        <span class="ms-1 text-success"
              role="button"
              tabindex="0"
              data-bs-toggle="popover"
              data-bs-trigger="click"
              data-bs-placement="right"
              title="Password Format"
              data-bs-content="If your name is Sharifa and your date of birth is 21/02/2005, your password will be shar2005.">
            ⓘ
        </span>
    </label>

    <input type="password"
           class="form-control"
           placeholder="Enter password">
</div>



            <div class="d-flex justify-content-between mb-3" style="font-size: 14px;">
                <div>
                    <input type="checkbox"> Remember Me
                </div>
            </div>
            <a href="student.php">
              <button class="btn login-btn">Log In</button>

            </a>

        
        </form>
    </div>

</body>
</html>
s