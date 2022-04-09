@extends('layouts.front')



@section('content')



<div class="page-banner-section">
    <div class="breadcrumbs">
        <div class="container">
            <ul class="breadcrumb-items">
                <li class="breadcrumb-item trail-begin"><a href="<?php echo url(" /");?>" rel="home"><span itemprop="name">Home</span></a></li>
                <li class="breadcrumb-item trail-end"><span itemprop="name">Search</span></li>
            </ul>
        </div>
    </div>
    <div class="page-banner page-banner-bg">
        <div class="container">
            <div class="page-banner-wrap">
            </div>
        </div>
    </div>
</div>
<!-- page-banner-section -->



<section class="site-content">

    <div class="container">



        <div class="content-wrapper">

            <div class="page-header text-center">

                <h1 class="page-title">

                    Search For </h1>

            </div>

            <div class="row">

                <div class="content-area col-12">

                    <div class="page-content">

                        <form action="<?php echo url(" job");?>" method="post">

                            @csrf

                            <div class="form-group-row">

                                <div class="form-group">

                                    <label>Search by Keyword</label>

                                    <input type="text" class="form-control" id="title" name="title">

                                </div>

                                <div class="form-group">

                                    <label>Search by Location</label>

                                    <input type="text" class="form-control" id="location" name="location">

                                </div>

                                <div class="form-submit">

                                    <button class="btn btn-primary" type="submit">Search Jobs</button>

                                </div>

                            </div>

                        </form>



                        <h1>You have sccessfully applied for the post of
                            <?php echo $job->title?>
                        </h1>





                    </div>





                </div>



            </div>

            <!--content-area -->

        </div>

        <!--row-->

    </div>

    <!--container-->





    </div>

    <!--content-wrapper -->



</section>

@endsection