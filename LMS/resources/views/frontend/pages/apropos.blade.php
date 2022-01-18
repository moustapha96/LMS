

@extends('backend.layouts.main')


@section('main')

<div class="container">
        <!-- Heading Page -->
        <section class="heading-page">
            <img src="images/bloggrid-heading-bg.jpg" alt="">
            <div class="container">
                <div class="heading-page-content">
                    <div class="au-page-title">
                        <h1>About us</h1>
                    </div>
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('../') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">About</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </section>

        <!-- Featured -->
        <section class="featured section-padding-large">
            <div class="container">
                <div class="section-title section-title-center">
                    <h2>Our Featured</h2>
                </div>
                <div class="featured-content">
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                            <article class="item">
                                <figure>
                                    <a href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="74px" height="74px">
                                        <path fill-rule="evenodd" 
                                        d="M72.806,73.999 L53.710,73.999 C52.993,73.999 52.516,73.522 52.516,72.806 L52.516,65.644 C52.516,60.990 56.216,57.289 60.871,57.289 L65.645,57.289 C70.300,57.289 74.000,60.990 74.000,65.644 L74.000,72.806 C74.000,73.522 73.522,73.999 72.806,73.999 ZM64.452,59.676 L62.064,59.676 L62.064,60.393 L63.258,61.586 L64.452,60.393 L64.452,59.676 ZM71.613,65.644 C71.613,62.780 69.584,60.393 66.839,59.797 L66.839,60.870 C66.839,61.228 66.719,61.467 66.481,61.706 L64.093,64.093 C63.616,64.570 62.900,64.570 62.423,64.093 L60.035,61.706 C59.797,61.467 59.677,61.228 59.677,60.870 L59.677,59.797 C56.932,60.393 54.903,62.780 54.903,65.644 L54.903,71.613 L57.290,71.613 L57.290,66.838 L59.677,66.838 L59.677,71.613 L66.839,71.613 L66.839,66.838 L69.226,66.838 L69.226,71.613 L71.613,71.613 L71.613,65.644 ZM34.613,4.774 C36.642,4.774 38.194,6.325 38.194,8.354 C38.194,8.473 38.194,8.473 38.194,8.593 C39.745,10.025 40.581,12.174 40.581,14.322 C40.581,16.470 39.745,18.619 38.194,20.051 C38.194,20.170 38.194,20.170 38.194,20.290 C38.194,22.319 36.642,23.870 34.613,23.870 C32.584,23.870 31.032,22.319 31.032,20.290 C31.032,20.170 31.032,20.170 31.032,20.051 C29.839,18.857 29.003,17.306 28.764,15.515 L23.632,15.515 C23.274,16.470 22.558,17.306 21.484,17.664 C19.693,18.380 17.664,17.425 16.948,15.515 C16.232,13.725 17.187,11.696 19.097,10.980 C20.887,10.264 22.916,11.218 23.632,13.128 L28.764,13.128 C28.884,11.457 29.719,9.786 31.032,8.593 C31.032,8.473 31.032,8.473 31.032,8.354 C31.032,6.325 32.584,4.774 34.613,4.774 ZM20.290,13.128 C19.574,13.128 19.097,13.606 19.097,14.322 C19.097,15.038 19.574,15.515 20.290,15.515 C21.006,15.515 21.484,15.038 21.484,14.322 C21.484,13.606 21.006,13.128 20.290,13.128 ZM34.613,7.161 C33.897,7.161 33.419,7.638 33.419,8.354 C33.419,9.070 33.897,9.548 34.613,9.548 C35.329,9.548 35.806,9.070 35.806,8.354 C35.806,7.638 35.329,7.161 34.613,7.161 ZM34.613,21.483 C35.329,21.483 35.806,21.006 35.806,20.290 C35.806,19.574 35.329,19.096 34.613,19.096 C33.897,19.096 33.419,19.574 33.419,20.290 C33.419,21.006 33.897,21.483 34.613,21.483 ZM32.106,17.783 C33.539,16.470 35.687,16.470 37.119,17.783 C37.835,16.709 38.194,15.515 38.194,14.322 C38.194,13.128 37.835,11.935 37.119,10.861 C35.687,12.174 33.539,12.174 32.106,10.861 C31.390,11.935 31.032,13.128 31.032,14.322 C31.032,15.515 31.390,16.709 32.106,17.783 ZM69.226,34.612 L68.032,34.612 L68.032,42.370 C69.584,43.803 70.419,45.713 70.419,47.741 C70.419,51.680 67.197,54.903 63.258,54.903 C59.319,54.903 56.097,51.680 56.097,47.741 L56.097,33.418 L8.355,33.418 C7.639,33.418 7.161,32.941 7.161,32.225 L7.161,3.580 C7.161,2.864 7.639,2.387 8.355,2.387 L11.935,2.387 L11.935,1.193 C11.935,0.477 12.413,-0.001 13.129,-0.001 L60.871,-0.001 C61.587,-0.001 62.064,0.477 62.064,1.193 L62.064,4.893 C63.735,4.774 65.287,5.729 66.123,7.161 C67.435,9.309 66.719,12.293 64.452,13.606 C62.303,14.919 59.319,14.083 58.006,11.935 C56.693,9.786 57.410,6.803 59.677,5.490 L59.677,2.387 L14.323,2.387 L14.323,26.257 L56.097,26.257 L56.097,22.677 L47.742,22.677 C45.713,22.677 44.161,21.125 44.161,19.096 C44.161,17.067 45.713,15.515 47.742,15.515 L68.032,15.515 C70.658,15.515 72.806,17.664 72.806,20.290 L72.806,31.031 C72.806,33.061 71.255,34.612 69.226,34.612 ZM62.064,11.935 C63.377,11.935 64.452,10.861 64.452,9.548 C64.452,8.235 63.377,7.161 62.064,7.161 C60.752,7.161 59.677,8.235 59.677,9.548 C59.677,10.861 60.752,11.935 62.064,11.935 ZM63.258,52.516 C65.884,52.516 68.032,50.367 68.032,47.741 C68.032,45.115 65.884,42.967 63.258,42.967 C60.632,42.967 58.484,45.115 58.484,47.741 C58.484,50.367 60.632,52.516 63.258,52.516 ZM13.129,28.644 C12.413,28.644 11.935,28.167 11.935,27.451 L11.935,4.774 L9.548,4.774 L9.548,31.031 L56.097,31.031 L56.097,28.644 L13.129,28.644 ZM48.935,17.903 L47.742,17.903 C47.026,17.903 46.548,18.380 46.548,19.096 C46.548,19.812 47.026,20.290 47.742,20.290 L48.935,20.290 L48.935,17.903 ZM70.419,20.290 C70.419,18.977 69.345,17.903 68.032,17.903 L51.323,17.903 L51.323,20.290 L57.290,20.290 C58.006,20.290 58.484,20.767 58.484,21.483 L58.484,42.370 C59.200,41.774 60.035,41.296 60.871,40.938 L60.871,31.031 L63.258,31.031 L63.258,40.580 C64.093,40.580 64.929,40.700 65.645,40.938 L65.645,20.290 L68.032,20.290 L68.032,27.451 L70.419,27.451 L70.419,20.290 ZM70.419,29.838 L68.032,29.838 L68.032,32.225 L69.226,32.225 C69.942,32.225 70.419,31.748 70.419,31.031 L70.419,29.838 ZM17.903,47.741 C17.903,51.680 14.681,54.903 10.742,54.903 C6.803,54.903 3.581,51.680 3.581,47.741 C3.581,43.803 6.803,40.580 10.742,40.580 C14.681,40.580 17.903,43.803 17.903,47.741 ZM5.968,47.741 C5.968,50.367 8.116,52.516 10.742,52.516 C13.368,52.516 15.516,50.367 15.516,47.741 C15.516,45.115 13.368,42.967 10.742,42.967 C8.116,42.967 5.968,45.115 5.968,47.741 ZM13.129,57.289 C17.784,57.289 21.484,60.990 21.484,65.644 L21.484,72.806 C21.484,73.522 21.006,73.999 20.290,73.999 L1.194,73.999 C0.477,73.999 -0.000,73.522 -0.000,72.806 L-0.000,65.644 C-0.000,60.990 3.700,57.289 8.355,57.289 L13.129,57.289 ZM11.935,59.676 L9.548,59.676 L9.548,60.393 L10.742,61.586 L11.935,60.393 L11.935,59.676 ZM7.161,60.870 L7.161,59.797 C4.416,60.393 2.387,62.780 2.387,65.644 L2.387,71.613 L4.774,71.613 L4.774,66.838 L7.161,66.838 L7.161,71.613 L14.323,71.613 L14.323,66.838 L16.710,66.838 L16.710,71.613 L19.097,71.613 L19.097,65.644 C19.097,62.780 17.068,60.393 14.323,59.797 L14.323,60.870 C14.323,61.228 14.203,61.467 13.964,61.706 L11.577,64.093 C11.100,64.570 10.384,64.570 9.906,64.093 L7.519,61.706 C7.281,61.467 7.161,61.228 7.161,60.870 ZM29.839,47.741 C29.839,43.803 33.061,40.580 37.000,40.580 C40.939,40.580 44.161,43.803 44.161,47.741 C44.161,51.680 40.939,54.903 37.000,54.903 C33.061,54.903 29.839,51.680 29.839,47.741 ZM41.774,47.741 C41.774,45.115 39.626,42.967 37.000,42.967 C34.374,42.967 32.226,45.115 32.226,47.741 C32.226,50.367 34.374,52.516 37.000,52.516 C39.626,52.516 41.774,50.367 41.774,47.741 ZM34.613,57.289 L39.387,57.289 C44.042,57.289 47.742,60.990 47.742,65.644 L47.742,72.806 C47.742,73.522 47.264,73.999 46.548,73.999 L27.452,73.999 C26.735,73.999 26.258,73.522 26.258,72.806 L26.258,65.644 C26.258,60.990 29.958,57.289 34.613,57.289 ZM38.194,59.676 L35.806,59.676 L35.806,60.393 L37.000,61.586 L38.194,60.393 L38.194,59.676 ZM28.645,71.613 L31.032,71.613 L31.032,66.838 L33.419,66.838 L33.419,71.613 L40.581,71.613 L40.581,66.838 L42.968,66.838 L42.968,71.613 L45.355,71.613 L45.355,65.644 C45.355,62.780 43.326,60.393 40.581,59.797 L40.581,60.870 C40.581,61.228 40.461,61.467 40.222,61.706 L37.835,64.093 C37.358,64.570 36.642,64.570 36.165,64.093 L33.777,61.706 C33.539,61.467 33.419,61.228 33.419,60.870 L33.419,59.797 C30.674,60.393 28.645,62.780 28.645,65.644 L28.645,71.613 Z"/>
                                        </svg>
                                    </a>
                                </figure>
                                <div class="info">
                                    <h3 class="title">
                                        <a href="#">Amazing Academy</a>
                                    </h3>
                                    <p class="desc">
                                        Sliquam malesuada bibendum arcu vitae el vita nunc egestas ip vulputate amet mi mattis pellentesque id.
                                    </p>
                                </div>
                            </article>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                            <article class="item">
                                <figure>
                                    <a href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="75px" height="75px">
                                        <path fill-rule="evenodd" 
                                        d="M71.371,21.773 C69.314,21.773 67.742,20.201 67.742,18.145 C67.742,17.298 68.105,16.451 68.588,15.846 L62.782,9.072 C62.177,9.435 61.330,9.677 60.483,9.677 C60.362,9.677 60.120,9.677 60.000,9.677 L55.040,17.902 C55.282,18.145 55.524,18.386 55.766,18.629 C57.580,20.564 57.459,23.588 55.524,25.403 L57.822,29.152 C57.943,29.152 58.185,29.152 58.306,29.152 C59.153,29.152 60.000,29.515 60.725,30.120 C62.177,31.451 62.298,33.750 60.967,35.201 C59.637,36.653 57.338,36.774 55.887,35.443 C54.435,34.113 54.314,31.814 55.645,30.362 L53.346,26.612 C52.136,26.975 50.927,26.733 49.838,26.128 L45.725,30.967 C46.572,31.572 47.177,32.419 47.298,33.386 C47.661,35.443 46.330,37.257 44.394,37.620 C42.338,37.984 40.523,36.653 40.160,34.717 C39.797,32.660 41.128,30.846 43.064,30.483 L48.023,24.556 C47.781,23.951 47.540,23.467 47.419,22.862 L34.838,18.629 C34.354,19.596 33.507,20.322 32.418,20.564 C30.483,21.169 28.547,19.959 27.942,18.024 C27.338,16.088 28.547,14.031 30.483,13.548 C32.418,12.943 34.475,14.153 34.959,16.088 L47.419,20.201 C48.144,18.265 49.959,16.935 52.015,16.935 C52.136,16.935 52.378,16.935 52.499,16.935 L57.701,8.830 C56.370,7.862 55.645,6.410 55.645,4.838 C55.645,2.176 57.822,-0.000 60.483,-0.000 C63.145,-0.000 65.322,2.176 65.322,4.838 C65.322,5.685 65.080,6.652 64.596,7.379 L70.766,14.637 C71.008,14.515 71.129,14.515 71.371,14.515 C73.427,14.515 75.000,16.088 75.000,18.145 C75.000,20.201 73.427,21.773 71.371,21.773 ZM58.064,33.870 C58.790,33.870 59.274,33.386 59.274,32.660 C59.274,31.935 58.790,31.451 58.064,31.451 C57.338,31.451 56.854,31.935 56.854,32.660 C56.854,33.386 57.338,33.870 58.064,33.870 ZM43.548,32.660 C42.822,32.660 42.338,33.144 42.338,33.870 C42.338,34.596 42.822,35.080 43.548,35.080 C44.273,35.080 44.757,34.596 44.757,33.870 C44.757,33.144 44.273,32.660 43.548,32.660 ZM31.451,15.725 C30.725,15.725 30.241,16.209 30.241,16.935 C30.241,17.661 30.725,18.145 31.451,18.145 C32.176,18.145 32.660,17.661 32.660,16.935 C32.660,16.209 32.176,15.725 31.451,15.725 ZM52.015,19.354 C50.685,19.354 49.596,20.443 49.596,21.773 C49.596,23.104 50.685,24.193 52.015,24.193 C53.346,24.193 54.435,23.104 54.435,21.773 C54.435,20.443 53.346,19.354 52.015,19.354 ZM60.483,2.419 C59.153,2.419 58.064,3.507 58.064,4.838 C58.064,6.169 59.153,7.257 60.483,7.257 C61.814,7.257 62.903,6.169 62.903,4.838 C62.903,3.507 61.814,2.419 60.483,2.419 ZM71.371,16.935 C70.645,16.935 70.161,17.419 70.161,18.145 C70.161,18.870 70.645,19.354 71.371,19.354 C72.097,19.354 72.580,18.870 72.580,18.145 C72.580,17.419 72.097,16.935 71.371,16.935 ZM37.136,31.814 C37.620,32.298 37.620,33.023 37.136,33.507 L31.934,38.709 L34.717,41.491 C35.201,41.975 35.201,42.701 34.717,43.185 L31.088,46.814 C30.604,47.298 29.878,47.298 29.394,46.814 L26.612,44.031 L26.249,44.394 C25.765,44.878 25.039,44.878 24.555,44.394 L21.773,41.612 L18.991,44.394 C18.507,44.878 17.781,44.878 17.297,44.394 L13.426,40.524 C12.579,42.218 12.095,44.031 12.095,45.967 C12.095,52.620 17.539,58.064 24.192,58.064 L33.870,58.064 L33.870,57.338 L30.604,54.072 C30.120,53.588 30.120,52.862 30.604,52.378 L41.491,41.491 C41.975,41.007 42.701,41.007 43.185,41.491 L46.814,45.120 C47.298,45.605 47.298,46.330 46.814,46.814 L41.128,52.499 L41.128,57.580 L46.330,52.378 L48.023,54.072 L40.765,61.330 C39.918,63.749 37.620,65.322 35.080,65.322 L29.031,65.322 L29.031,67.742 L35.080,67.742 C35.805,67.742 36.289,68.226 36.289,68.951 L36.289,73.790 C36.289,74.515 35.805,74.999 35.080,74.999 L13.305,74.999 C12.579,74.999 12.095,74.515 12.095,73.790 L12.095,68.951 C12.095,68.226 12.579,67.742 13.305,67.742 L19.353,67.742 L19.353,64.596 C11.006,62.418 5.079,54.919 4.837,46.209 C4.837,42.338 5.926,38.467 8.103,35.201 L3.990,31.088 C3.506,30.604 3.506,29.878 3.990,29.395 L9.192,24.193 L7.619,22.620 C7.135,22.136 7.135,21.410 7.619,20.927 L8.587,19.959 L6.652,18.024 L5.684,18.991 C5.200,19.475 4.474,19.475 3.990,18.991 L0.361,15.362 C-0.123,14.878 -0.123,14.153 0.361,13.669 L8.829,5.201 C9.313,4.717 10.039,4.717 10.523,5.201 L14.152,8.830 C14.636,9.314 14.636,10.040 14.152,10.523 L13.184,11.491 L15.119,13.427 L16.087,12.459 C16.571,11.975 17.297,11.975 17.781,12.459 L33.507,28.185 L37.136,31.814 ZM30.241,44.274 L32.176,42.338 L30.241,40.402 L28.305,42.338 L30.241,44.274 ZM18.144,41.854 L20.926,39.072 L22.499,37.500 L20.563,35.564 C19.837,36.048 18.991,36.290 18.144,36.290 C17.781,36.290 17.418,36.290 17.176,36.169 C16.208,36.894 15.482,37.620 14.757,38.467 L18.144,41.854 ZM20.563,31.451 C20.563,30.120 19.474,29.032 18.144,29.032 C16.813,29.032 15.724,30.120 15.724,31.451 C15.724,32.782 16.813,33.870 18.144,33.870 C19.474,33.870 20.563,32.782 20.563,31.451 ZM44.273,45.967 L42.338,44.031 L33.144,53.225 L35.080,55.160 L44.273,45.967 ZM14.515,70.161 L14.515,72.580 L33.870,72.580 L33.870,70.161 L14.515,70.161 ZM26.612,67.742 L26.612,65.322 L24.676,65.322 C23.708,65.322 22.741,65.201 21.773,65.080 L21.773,67.742 L26.612,67.742 ZM7.256,46.209 C7.498,55.523 15.361,63.024 24.676,62.902 L35.080,62.902 C37.136,62.902 38.709,61.330 38.588,59.274 L38.588,54.919 L36.168,57.338 L36.168,59.274 C36.168,60.000 35.685,60.483 34.959,60.483 L24.071,60.483 C19.837,60.483 15.845,58.669 13.063,55.403 C7.861,49.354 8.708,40.161 14.757,34.959 C14.152,34.475 13.789,33.750 13.547,32.903 C9.434,36.048 7.135,41.007 7.256,46.209 ZM6.531,30.241 L9.676,33.266 C10.765,31.935 12.216,30.725 13.668,29.757 C13.789,29.515 13.910,29.273 14.031,29.032 L10.885,25.887 L6.531,30.241 ZM9.676,7.741 L2.901,14.515 L4.837,16.451 L11.611,9.677 L9.676,7.741 ZM11.490,13.185 L8.345,16.330 L10.281,18.265 L13.426,15.121 L11.490,13.185 ZM29.031,27.096 L26.249,29.878 L24.555,28.185 L27.338,25.403 L20.563,18.629 L17.781,21.410 L16.087,19.717 L18.870,16.935 L16.934,14.999 L10.160,21.773 L15.724,27.338 C16.450,26.854 17.297,26.612 18.144,26.612 C20.805,26.612 22.983,28.789 22.983,31.451 C22.983,32.298 22.741,33.144 22.257,33.870 L24.192,35.806 L30.967,29.032 L29.031,27.096 ZM25.039,38.346 L23.466,39.919 L25.402,41.854 L34.596,32.660 L32.660,30.725 L25.039,38.346 Z"/>
                                        </svg>
                                    </a>
                                </figure>
                                <div class="info">
                                    <h3 class="title">
                                        <a href="#">High Quality Courses</a>
                                    </h3>
                                    <p class="desc">
                                        Diam quam nulla porttitor massa id aliquam vestibulum. Ullamcorper eget null facilisi etiam dignissim.
                                    </p>
                                </div>
                            </article>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                            <article class="item">
                                <figure>
                                    <a href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="65px" height="65px">
                                        <path fill-rule="evenodd" 
                                        d="M63.952,56.612 L29.355,56.612 L29.355,63.951 C29.355,64.580 28.935,64.999 28.306,64.999 L11.532,64.999 C10.903,64.999 10.484,64.580 10.484,63.951 L10.484,56.612 L1.048,56.612 C0.419,56.612 -0.000,56.193 -0.000,55.564 L-0.000,9.435 C-0.000,8.806 0.419,8.386 1.048,8.386 L10.484,8.386 L10.484,1.048 C10.484,0.419 10.903,-0.001 11.532,-0.001 L28.306,-0.001 C28.935,-0.001 29.355,0.419 29.355,1.048 L29.355,8.386 L63.952,8.386 C64.581,8.386 65.000,8.806 65.000,9.435 L65.000,55.564 C65.000,56.193 64.581,56.612 63.952,56.612 ZM29.355,46.128 L38.685,46.128 L35.855,42.564 C35.540,42.249 35.540,41.620 35.855,41.306 L38.685,37.741 L31.452,37.741 L31.452,40.887 C31.452,41.515 31.032,41.934 30.403,41.934 L29.355,41.934 L29.355,46.128 ZM12.581,62.903 L27.258,62.903 L27.258,60.806 L14.677,60.806 L14.677,58.709 L27.258,58.709 L27.258,41.934 L12.581,41.934 L12.581,62.903 ZM29.355,39.838 L29.355,31.451 L10.484,31.451 L10.484,39.838 L29.355,39.838 ZM2.097,54.515 L10.484,54.515 L10.484,48.225 L2.097,48.225 L2.097,54.515 ZM2.097,46.128 L10.484,46.128 L10.484,41.934 L9.435,41.934 L2.097,41.934 L2.097,46.128 ZM2.097,39.838 L8.387,39.838 L8.387,37.741 L2.097,37.741 L2.097,39.838 ZM10.484,10.483 L2.097,10.483 L2.097,35.645 L8.387,35.645 L8.387,26.209 C8.387,25.580 8.806,25.160 9.435,25.160 L10.484,25.160 L10.484,10.483 ZM27.258,2.096 L12.581,2.096 L12.581,4.193 L25.161,4.193 L25.161,6.290 L12.581,6.290 L12.581,25.160 L27.258,25.160 L27.258,2.096 ZM10.484,27.257 L10.484,29.354 L29.355,29.354 L29.355,27.257 L10.484,27.257 ZM62.903,10.483 L29.355,10.483 L29.355,25.160 L30.403,25.160 C31.032,25.160 31.452,25.580 31.452,26.209 L31.452,35.645 L40.887,35.645 C41.097,35.645 41.306,35.749 41.516,35.854 C42.040,36.169 42.040,36.902 41.726,37.322 L38.056,41.934 L41.726,46.548 C41.831,46.757 41.935,46.967 41.935,47.177 C41.935,47.806 41.516,48.225 40.887,48.225 L29.355,48.225 L29.355,54.515 L62.903,54.515 L62.903,10.483 ZM40.048,32.184 C39.629,31.766 39.629,31.137 40.048,30.717 L44.137,26.629 C41.097,23.379 41.097,18.451 44.137,15.201 C47.282,11.846 52.629,11.636 55.984,14.782 C59.339,17.926 59.548,23.273 56.403,26.629 L60.492,30.717 C60.702,30.927 60.806,31.137 60.806,31.451 C60.806,32.080 60.387,32.500 59.758,32.500 L57.661,32.500 L57.661,34.596 C57.661,34.911 57.556,35.120 57.347,35.330 C56.927,35.749 56.298,35.749 55.879,35.330 L50.323,29.773 L44.766,35.330 C44.556,35.540 44.347,35.645 44.032,35.645 C43.403,35.645 42.984,35.225 42.984,34.596 L42.984,32.500 L40.887,32.500 C40.573,32.500 40.363,32.395 40.048,32.184 ZM55.564,32.080 L55.564,31.451 C55.564,30.822 55.984,30.403 56.613,30.403 L57.242,30.403 L54.831,27.991 C54.097,28.515 53.363,28.830 52.524,29.040 L55.564,32.080 ZM56.613,20.967 C56.613,17.507 53.782,14.677 50.323,14.677 C46.863,14.677 44.032,17.507 44.032,20.967 C44.032,24.427 46.863,27.257 50.323,27.257 C53.782,27.257 56.613,24.427 56.613,20.967 ZM44.032,30.403 C44.661,30.403 45.081,30.822 45.081,31.451 L45.081,32.080 L48.121,29.040 C47.282,28.830 46.548,28.411 45.814,27.991 L43.403,30.403 L44.032,30.403 ZM50.323,15.725 C53.258,15.725 55.564,18.032 55.564,20.967 C55.564,23.903 53.258,26.209 50.323,26.209 C47.387,26.209 45.081,23.903 45.081,20.967 C45.081,18.032 47.387,15.725 50.323,15.725 ZM50.323,24.112 C52.105,24.112 53.468,22.750 53.468,20.967 C53.468,19.184 52.105,17.822 50.323,17.822 C48.540,17.822 47.177,19.184 47.177,20.967 C47.177,22.750 48.540,24.112 50.323,24.112 ZM60.806,52.419 L46.129,52.419 L46.129,50.321 L60.806,50.321 L60.806,52.419 ZM52.419,46.128 L60.806,46.128 L60.806,48.225 L52.419,48.225 L52.419,46.128 Z"/>
                                        </svg>
                                    </a>
                                </figure>
                                <div class="info">
                                    <h3 class="title">
                                        <a href="#">100% Certificate</a>
                                    </h3>
                                    <p class="desc">
                                        Odio tempor orci dapibus ultrices in iaculis. Tincidunt eget nullam non nisi est amet ipsum consequat nisl.
                                    </p>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Testimonials -->
        <section class="testimonials background-grey section-padding-large">
            <div class="container">
                <div class="section-title section-title-center wow slideInLeft" data-wow-delay="0.05s">
                    <h2>Testimonials</h2>
                </div>
                <div class="testimonials-content">
                    <div class="row">
                        <article class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 item">
                            <div class="info">
                                <span class="item-name">Good Courses</span>
                                <p class="desc">“In hendrerit gravida rutrum quisque non. Suspendisse faucibus interdum posuere lorem ipsum dolor fermentum iaculis eu non diam. Hendrerit dolor magna eget est lorem. Tempor commodo ullamcorper a lacus vestibulum.”</p>
                            </div>
                            <figure>
                                <img src="images/testimonials-1.jpg" alt="">
                                <div class="thumb-info">
                                    <h4 class="title"><a href="#">Elizabeth King</a></h4>
                                    <a href="#" class="categories">Poster Design</a>
                                </div>
                            </figure>
                        </article>
                        <article class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 item">
                            <div class="info">
                                <span class="item-name">Best Support 24/7</span>
                                <p class="desc">“Senectus et netus et malesuada fames ac turpis egestas maecenas. Id porta nibh venenatis cras sed felis. Ornare massa eget egestas purus. Vel pretium lectus quam id leo. Gravida in fermentum et sollicitudin ac faucibus scelerisque.”</p>
                            </div>
                            <figure>
                                <img src="images/testimonials-2.jpg" alt="">
                                <div class="thumb-info">
                                    <h4 class="title"><a href="#">Lucas Andrews</a></h4>
                                    <a href="#" class="categories">UI Design</a>
                                </div>
                            </figure>
                        </article>
                        <article class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 item">
                            <div class="info">
                                <span class="item-name">Amazing Program</span>
                                <p class="desc">“Hendrerit dolor magna eget est lorem. Tempor commodo ullamcorper a lacus vestibulum sed. Cras tincidunt lobortis feugiat vivamus. Senectus et netus et malesuada fames ac turpis egestas maecenas interdum posuere.”</p>
                            </div>
                            <figure>
                                <img src="images/testimonials-3.jpg" alt="">
                                <div class="thumb-info">
                                    <h4 class="title"><a href="#">Tiffany Jenkins</a></h4>
                                    <a href="#" class="categories">Web Designer</a>
                                </div>
                            </figure>
                        </article>
                        <article class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 item">
                            <div class="info">
                                <span class="item-name">Good Courses</span>
                                <p class="desc">“Tempor commodo ullamcorper a lacus vestibulum sed. Cras tincidunt lobortis feugiat vivamus. Senectus et netus et malesuada fames ac turpis egestas maecenas. Id porta nibh venenatis cras sed felis. Ornare massa eget egestas purus.”</p>
                            </div>
                            <figure>
                                <img src="images/testimonials-4.jpg" alt="">
                                <div class="thumb-info">
                                    <h4 class="title"><a href="#">Gabriel Henry</a></h4>
                                    <a href="#" class="categories">UX Design</a>
                                </div>
                            </figure>
                        </article>
                    </div>
                </div>
            </div>
        </section>

        <!-- Our skillls -->
        <section class="aboutus-skillls section-padding-large js-waypoint wow fadeIn" data-wow-delay="0.3s">
            <div class="container">
                <div class="our-skillls-content">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="list-skills">
                                <h2 class="title">Our Teaching Skills</h2>
                                <p class="desc">Convallis aenean et tortor at risus viverra adipiscing at. Faucibus a pellentesque sit am morbi. A condimentum vitae sapien pellentesq habitant morbi. Ullamcorper e nulla facilisi etiam.
                                     A scelerisque purus semper eges. consectetur purus ut faucibus pulvinar consequat ma nunc congue eget nulla facilisi etiam.</p>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="skills">
                                <div class="progress-bar">
                                    <div class="progress-box">
                                        <div class="au-progress au-progress-1">
                                            <div class="au-progress-bar au-progress-green" role="progressbar" data-transitiongoal="95">
                                                <h5>UI Design</h5>
                                                <span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="progress-box">
                                        <div class="au-progress au-progress-1">
                                            <div class="au-progress-bar au-progress-violet" role="progressbar" data-transitiongoal="80">
                                                <h5>UX Design</h5>
                                                <span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="progress-box">
                                        <div class="au-progress au-progress-1">
                                            <div class="au-progress-bar au-progress-blue" role="progressbar" data-transitiongoal="60">
                                                <h5>Marketing</h5>
                                                <span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="progress-box">
                                        <div class="au-progress au-progress-1">
                                            <div class="au-progress-bar au-progress-pink" role="progressbar" data-transitiongoal="70">
                                                <h5>Web Developer</h5>
                                                <span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Our Team -->
        <section class="our-team background-grey section-padding-large">
            <div class="container">
                <div class="section-title section-title-left wow slideInLeft" data-wow-delay="0.05s">
                    <h2>Specialist Team</h2>
                </div>
                <div class="our-team-content">
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                            <article class="item wow fadeIn" data-wow-delay="0.1s">
                                <figure>
                                    <a href="#">
                                        <img src="images/our-team-1.jpg" alt="">
                                    </a>
                                    <div class="our-team-socials position-center">
                                        <ul class="display-flex-center">
                                            <li>
                                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fab fa-google-plus-g"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fab fa-youtube"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </figure>
                                <div class="info">
                                    <h4 class="title"><a href="#">Charles Williams</a></h4>
                                    <span class="job-title">Manager</span>
                                    <p class="desc">
                                        Excepteur sint occaecat cupidatat non proident, sunt in culpa officia.
                                    </p>
                                </div>
                            </article>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                            <article class="item wow fadeIn" data-wow-delay="0.3s">
                                <figure>
                                    <a href="#">
                                        <img src="images/our-team-2.jpg" alt="">
                                    </a>
                                    <div class="our-team-socials position-center">
                                        <ul class="display-flex-center">
                                            <li>
                                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fab fa-google-plus-g"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fab fa-youtube"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </figure>
                                <div class="info">
                                    <h4 class="title"><a href="#">Henrik Campbell</a></h4>
                                    <span class="job-title">Teacher</span>
                                    <p class="desc">
                                        Dapibus ultrices in iaculis nunc sed augue lacus viverra.
                                    </p>
                                </div>
                            </article>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                            <article class="item wow fadeIn" data-wow-delay="0.5s">
                                <figure>
                                    <a href="#">
                                        <img src="images/our-team-3.jpg" alt="">
                                    </a>
                                    <div class="our-team-socials position-center">
                                        <ul class="display-flex-center">
                                            <li>
                                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fab fa-google-plus-g"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fab fa-youtube"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </figure>
                                <div class="info">
                                    <h4 class="title"><a href="#">Marie Washington</a></h4>
                                    <span class="job-title">Teacher</span>
                                    <p class="desc">
                                        Nec tincidunt praesent semper feugiat nibh sed pulvinar proin.
                                    </p>
                                </div>
                            </article>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                            <article class="item wow fadeIn" data-wow-delay="0.1s">
                                <figure>
                                    <a href="#">
                                        <img src="images/our-team-4.jpg" alt="">
                                    </a>
                                    <div class="our-team-socials position-center">
                                        <ul class="display-flex-center">
                                            <li>
                                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fab fa-google-plus-g"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fab fa-youtube"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </figure>
                                <div class="info">
                                    <h4 class="title"><a href="#">William Fuller</a></h4>
                                    <span class="job-title">Teacher</span>
                                    <p class="desc">
                                        Eget nunc lobortis mattis convallis aliquam faucibus purus
                                    </p>
                                </div>
                            </article>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                            <article class="item wow fadeIn" data-wow-delay="0.3s">
                                <figure>
                                    <a href="#">
                                        <img src="images/our-team-5.jpg" alt="">
                                    </a>
                                    <div class="our-team-socials position-center">
                                        <ul class="display-flex-center">
                                            <li>
                                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fab fa-google-plus-g"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fab fa-youtube"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </figure>
                                <div class="info">
                                    <h4 class="title"><a href="#">Tiffany Gilber</a></h4>
                                    <span class="job-title">Teacher</span>
                                    <p class="desc">
                                        Enim blandit volutpat maec volutpat blandit aliquam etiam erat.
                                    </p>
                                </div>
                            </article>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                            <article class="item wow fadeIn" data-wow-delay="0.5s">
                                <figure>
                                    <a href="#">
                                        <img src="images/our-team-6.jpg" alt="">
                                    </a>
                                    <div class="our-team-socials position-center">
                                        <ul class="display-flex-center">
                                            <li>
                                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fab fa-google-plus-g"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fab fa-youtube"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </figure>
                                <div class="info">
                                    <h4 class="title"><a href="#">Bobby Bailey</a></h4>
                                    <span class="job-title">Teacher</span>
                                    <p class="desc">
                                        Tincidunt lobortis feugiat vivamus at augue eget arcu.
                                    </p>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </section>

</div>

@endsection