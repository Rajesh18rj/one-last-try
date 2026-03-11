<main class="flex-1 p-4 md:p-6 lg:p-8 relative overflow-hidden">

    <!-- Hero Card -->
    <div class="hero-card relative rounded-3xl p-8 lg:p-12 overflow-hidden">

        <div class="relative flex flex-col lg:flex-row lg:items-center lg:justify-between gap-10 z-10">

            <!-- Welcome -->
            <div class="flex-1">

                <div class="dashboard-badge">

                    <div class="status-dot"></div>

                    Your Wellness Dashboard

                </div>


                <h1 class="welcome-text">

                    Welcome,

                    <span class="username">
                        {{ auth()->user()->name ?? 'Customer' }}
                    </span>

                </h1>


                <p class="desc">

                    View your scheduled sessions, track upcoming appointments, and continue your wellness journey with expert guidance.
                </p>

            </div>



            <!-- Illustration -->
            <div class="hero-icon">

                <div class="icon-glow"></div>

                <div class="icon-core">

                    <i class="fa-solid fa-heart"></i>

                </div>

                <div class="badge badge1">
                    CLIENT
                </div>

                <div class="badge badge2">
                    WELLNESS
                </div>

            </div>

        </div>

    </div>

</main>



<style>

    .hero-card{

        background:linear-gradient(135deg,
        rgba(255,255,255,.96),
        rgba(255,248,232,.85));

        backdrop-filter:blur(18px);

        border:1px solid rgba(255,210,140,.4);

        box-shadow:
            0 15px 50px rgba(247,156,35,.15);

        transition:.4s;

        animation:fadeUp .7s ease;

    }


    .hero-card:hover{

        transform:translateY(-4px);

        box-shadow:
            0 25px 70px rgba(247,156,35,.25);

    }


    .dashboard-badge{

        display:inline-flex;

        align-items:center;

        gap:10px;

        padding:10px 18px;

        border-radius:14px;

        font-weight:600;

        color:#F79C23;

        background:rgba(247,156,35,.10);

        border:1px solid rgba(247,156,35,.30);

        margin-bottom:20px;

    }


    .status-dot{

        width:10px;

        height:10px;

        background:#F79C23;

        border-radius:50%;

        animation:pulse 2s infinite;

    }


    .welcome-text{

        font-size:48px;

        font-weight:800;

        color:#2d2d2d;

        line-height:1.2;

        animation:fadeUp 1s ease;

    }


    .username{

        display:block;

        background:linear-gradient(
            90deg,
            #F79C23,
            #fbbf24,
            #F79C23);

        background-size:200%;

        -webkit-background-clip:text;

        color:transparent;

        animation:gradientMove 5s infinite;

    }


    .desc{

        color:#6b7280;

        font-size:18px;

        margin-top:15px;

        max-width:500px;

    }


    .hero-icon{

        position:relative;

        width:220px;

        height:220px;

        border-radius:30px;

        display:flex;

        align-items:center;

        justify-content:center;

        background:linear-gradient(
            135deg,
            #FFF8E8,
            #FFE2A8);

        box-shadow:
            0 20px 50px rgba(247,156,35,.2);

        animation:fadeUp 1.2s ease;

    }


    .icon-core{

        width:120px;

        height:120px;

        background:linear-gradient(
            135deg,
            #F79C23,
            #fbbf24);

        border-radius:25px;

        display:flex;

        align-items:center;

        justify-content:center;

        color:white;

        font-size:60px;

        animation:float 4s ease-in-out infinite;

        transition:.4s;

    }


    .hero-icon:hover .icon-core{

        transform:scale(1.08);

    }


    .icon-glow{

        position:absolute;

        inset:0;

        border-radius:30px;

        background:linear-gradient(
            90deg,
            transparent,
            #F79C23,
            transparent);

        filter:blur(25px);

        opacity:.35;

        animation:spin 20s linear infinite;

    }


    .badge{

        position:absolute;

        font-size:12px;

        font-weight:700;

        padding:6px 14px;

        border-radius:30px;

        color:white;

    }


    .badge1{

        top:-10px;

        right:-10px;

        background:#fbbf24;

        animation:float 6s infinite;

    }


    .badge2{

        bottom:-10px;

        left:-10px;

        background:#F79C23;

        animation:pulse 3s infinite;

    }



    /* Animations */

    @keyframes fadeUp{

        from{
            opacity:0;
            transform:translateY(25px);
        }

        to{
            opacity:1;
            transform:translateY(0);
        }

    }


    @keyframes gradientMove{

        0%{background-position:0%}
        50%{background-position:100%}
        100%{background-position:0%}

    }


    @keyframes borderMove{

        0%{transform:translateX(-100%)}
        100%{transform:translateX(100%)}

    }


    @keyframes pulse{

        0%{transform:scale(.9);opacity:.7}
        50%{transform:scale(1.1);opacity:1}
        100%{transform:scale(.9);opacity:.7}

    }


    @keyframes float{

        0%,100%{transform:translateY(0)}
        50%{transform:translateY(-10px)}

    }


    @keyframes spin{

        from{transform:rotate(0)}
        to{transform:rotate(360deg)}

    }

</style>
