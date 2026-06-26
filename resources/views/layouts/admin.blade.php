<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<meta
name="viewport"
content="width=device-width, initial-scale=1.0">

@vite(['resources/css/app.css'])

<title>Admin - RamenGo</title>


<style>

/* ==========================
THEME ADMIN
========================== */

body.japan-theme{

background:
linear-gradient(
180deg,
#120402,
#1A0502,
#250903
);

color:#FFF7ED;

}


/* ==========================
FORM
========================== */

.japan-theme input,
.japan-theme textarea,
.japan-theme select{

background:#2A0B05 !important;

color:#FFF7ED !important;

border:
1px solid
rgba(251,146,60,.35)
!important;

}


/* placeholder */

.japan-theme input::placeholder,
.japan-theme textarea::placeholder{

color:
rgba(
253,
186,
116,
.65
)
!important;

}


/* focus */

.japan-theme input:focus,
.japan-theme textarea:focus,
.japan-theme select:focus{

outline:none !important;

border-color:
#F59E0B
!important;

box-shadow:
0 0 0 3px
rgba(
245,
158,
11,
.25
)
!important;

}


/* option */

.japan-theme option{

background:#2A0B05;

color:white;

}


/* textarea */

.japan-theme textarea{

min-height:220px;

resize:vertical;

}


/* upload */

.japan-theme input[type=file]{

background:transparent !important;

}


/* card */

.theme-card{

background:

linear-gradient(
135deg,
#2A0B05,
#451109
);

border:

1px solid
rgba(
212,
175,
55,
.2
);

}


/* nav */

.theme-nav{

background:

linear-gradient(
90deg,
#140504,
#240705,
#140504
);

border-bottom:

1px solid
rgba(
212,
175,
55,
.15
);

}


/* button */

.theme-btn{

background:

linear-gradient(
90deg,
#D97706,
#F59E0B
);

color:white;

transition:.3s;

}

.theme-btn:hover{

transform:
translateY(-2px);

filter:
brightness(1.1);

}

</style>

</head>



<body class="japan-theme">

<nav class="theme-nav">

<div
class="
container
mx-auto
flex
items-center
justify-between
px-8
py-5">

<h1
class="
text-3xl
font-extrabold
text-[#D4AF37]">

RamenGo Admin

</h1>


<div
class="
flex
items-center
gap-6">

<span
class="
font-semibold
text-[#F4EFEA]/80">

{{ optional(Auth::user())->name }}

</span>


<a
href="{{ route('admin.index') }}"
class="
font-semibold
text-[#F4EFEA]/85
hover:text-[#D4AF37]">

Dashboard

</a>


<a
href="{{ route('admin.menu.index') }}"
class="
font-semibold
text-[#F4EFEA]/85
hover:text-[#D4AF37]">

Menu

</a>


<a
href="{{ route('content.index') }}"
class="
font-semibold
text-[#F4EFEA]/85
hover:text-[#D4AF37]">

Konten Website

</a>


<a
href="{{ route('admin.meja.index') }}"
class="
font-semibold
text-[#F4EFEA]/85
hover:text-[#D4AF37]">

Meja

</a>


<a
href="{{ route('profile.edit') }}"
class="
font-semibold
text-[#F4EFEA]/85
hover:text-[#D4AF37]">

Profile

</a>


<form
method="POST"
action="{{ route('logout') }}">

@csrf

<button
type="submit"
class="
theme-btn
rounded-xl
px-4
py-2
font-bold">

Logout

</button>

</form>

</div>

</div>

</nav>


<div
class="
container
mx-auto
p-8">

@yield('content')

</div>

</body>

</html>