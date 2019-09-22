<!--============================= BLOG =============================-->
<title><?= $judul; ?></title>
<section class="blog-wrap">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <?php echo $this->session->flashdata('msg'); ?>
                <?php foreach ($data->result() as $row) : ?>
                    <div class="blog-single-item">
                        <div class="blog-img_block">
                            <img src="<?php echo base_url() . 'assets/images/' . $row->tulisan_gambar; ?>" class="img-fluid" alt="blog-img">
                            <div class="blog-date">
                                <span><?php echo $row->tanggal; ?></span>
                            </div>
                        </div>
                        <div class="blog-tiltle_block">
                            <h4><a href="<?php echo site_url('artikel/' . $row->tulisan_slug); ?>"><?php echo $row->tulisan_judul; ?></a></h4>
                            <h6> <a href="#"><i class="fa fa-user" aria-hidden="true"></i><span><?php echo $row->tulisan_author; ?></span> </a> | <a href="#"><i class="fa fa-tags" aria-hidden="true"></i><span><?php echo $row->tulisan_kategori_nama; ?></span></a></h6>
                            <?php echo limit_words($row->tulisan_isi, 10) . '...'; ?>
                            <div class="blog-icons">
                                <div class="blog-share_block">
                                    <a href="<?php echo site_url('artikel/' . $row->tulisan_slug); ?>">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <nav>
                    <?php error_reporting(0);
                    echo $page; ?>
                </nav>
            </div>
            <div class="col-md-4">
                <form action="<?php echo site_url('blog/search'); ?>" method="get">
                    <input type="text" name="keyword" placeholder="Search" class="blog-search" required>
                    <button type="submit" class="btn btn-warning btn-blogsearch">SEARCH</button>
                </form>
                <div class="blog-category_block">
                    <h3>Kategori</h3>
                    <ul>
                        <?php foreach ($category->result() as $row) : ?>
                            <li><a href="<?php echo site_url('blog/kategori/' . str_replace(" ", "-", $row->kategori_nama)); ?>"><?php echo $row->kategori_nama; ?><i class="fa fa-caret-right" aria-hidden="true"></i></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="blog-featured_post">
                    <h3>Populer</h3>
                    <?php foreach ($populer->result() as $row) : ?>
                        <div class="blog-featured-img_block">
                            <img width="35%" src="<?php echo base_url() . 'assets/images/' . $row->tulisan_gambar; ?>" class="img-fluid" alt="blog-featured-img">
                            <h5><a href="<?php echo site_url('artikel/' . $row->tulisan_slug); ?>"><?php echo limit_words($row->tulisan_judul, 3) . '...'; ?></a></h5>
                            <p><?php echo limit_words($row->tulisan_isi, 5) . '...'; ?></p>
                        </div>
                        <hr>
                    <?php endforeach; ?>
                </div>

            </div>
        </div>
    </div>
</section>
<!--//END BLOG -->