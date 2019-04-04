<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<svg id="clip-paths" width="0" height="0" version="1.1" xmlns="http://www.w3.org/2000/svg"
     xmlns:xlink="http://www.w3.org/1999/xlink">
    <g></g>
</svg>
<link type="text/css" rel="stylesheet" href="<?php $this->options->themeUrl('css/main.css') ?>">
<div id="page">
    <header style="right: 70%;">
        <div id="header-content">
            <div id="header-logo">
                <?php if ($this->options->logo != null): ?>
                    <img class="logo" src="<?php $this->options->logo(); ?>" width=50%>
                <?php elseif ($this->options->g_name != null): ?>
                    <img class="logo" src="<?php get_avatar($this->options->g_name); ?>" width=50%>
                <?php endif; ?>
            </div>
            <h1><?php $this->author(); ?> </h1>
            <p><?php if ($this->options->self_intro == null):
                    $this->options->description();
                else:
                    $this->options->self_intro();
                endif; ?></p>
            <div id="contact">
                <a href="https://twitter.com/<?php echo $this->options->tw_name; ?>" id="twitter" target="_blank">
                    <svg viewBox="0 0 42 36" xmlns="http://www.w3.org/2000/svg">
                        <path d="M40.885 5.917a16.098 16.098 0 0 1-4.7 1.315 8.35 8.35 0 0 0 3.598-4.62 16.18 16.18 0 0 1-5.196 2.026A8.094 8.094 0 0 0 28.614 2c-4.52 0-8.183 3.74-8.183 8.353 0 .655.073 1.293.213 1.904-6.8-.348-12.83-3.674-16.866-8.728a8.447 8.447 0 0 0-1.108 4.2 8.397 8.397 0 0 0 3.64 6.952 8.024 8.024 0 0 1-3.707-1.045v.105c0 4.047 2.82 7.423 6.563 8.19a8.035 8.035 0 0 1-3.695.144c1.042 3.32 4.064 5.734 7.645 5.8A16.206 16.206 0 0 1 1 31.337a22.818 22.818 0 0 0 12.544 3.754c15.05 0 23.282-12.73 23.282-23.768 0-.362-.008-.723-.024-1.08a16.82 16.82 0 0 0 4.083-4.325z"/>
                    </svg>
                </a>
                <a href="https://github.com/<?php echo $this->options->g_name; ?>" id="github" target="_blank">
                    <svg aria-labelledby="simpleicons-github-icon" role="img" viewBox="0 0 24 24"
                         xmlns="http://www.w3.org/2000/svg"><title id="simpleicons-github-icon">GitHub icon</title>
                        <path d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12"/>
                    </svg>
                </a>
                <a href="<?php echo "https://" . $this->options->blog_url; ?>" id="blog" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50">
                        <path d="M 9 4 C 6.239 4 4 6.239 4 9 L 4 41 C 4 43.761 6.239 46 9 46 L 41 46 C 43.761 46 46 43.761 46 41 L 46 9 C 46 6.239 43.761 4 41 4 L 9 4 z M 20 12 L 25 12 C 29.42 12 33.033 15.632547 33 20.060547 C 32.991 21.141547 33.919 22 35 22 L 36 22 C 37.105 22 38 22.895 38 24 L 38 30 C 38 34.4 34.4 38 30 38 L 20 38 C 15.6 38 12 34.4 12 30 L 12 25 L 12 20 C 12 15.6 15.6 12 20 12 z M 20 18 C 18.9 18 18 18.9 18 20 C 18 21.1 18.9 22 20 22 L 25 22 C 26.1 22 27 21.1 27 20 C 27 18.9 26.1 18 25 18 L 20 18 z M 20 28 C 18.9 28 18 28.9 18 30 C 18 31.1 18.9 32 20 32 L 30 32 C 31.1 32 32 31.1 32 30 C 32 28.9 31.1 28 30 28 L 20 28 z"></path>
                    </svg>
                </a>
                <a href="mailto:<?php echo $this->options->email; ?>" id="email">
                    <svg viewBox="0 0 42 36" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3.025 5.255A1.99 1.99 0 0 1 4.003 5h33.994c.354 0 .688.093.977.256L21 18.5 3.025 5.255zm-1.002 1.45c-.015.098-.023.2-.023.302V18.28v-5.636 17.35C2 31.1 2.902 32 4.003 32h33.994A2.005 2.005 0 0 0 40 29.993v-17.35 5.638V7.008c0-.103-.008-.204-.023-.303L21 20.687 2.023 6.704z"/>
                    </svg>
                </a>
            </div>
            <div id="footer">
                <?php echo date('Y'); ?> <a
                        href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a>.
                <p> <?php _e('Using <a target="_blank" href="http://www.typecho.org">Typecho</a> & <a target="_blank" href="https://github.com/SorashitaInnei/Magic-for-typecho">Magic.</a>'); ?></p>

            </div>
        </div>
    </header>
</div>
<div id="content" style="left: 40%">
    <h1><?php $this->title() ?></h1>
    <div id="main">
        <div class="post-meta">
            <p>Written by <a itemprop="name" href="<?php $this->author->permalink(); ?>" rel="author"><?php $this->author(); ?></a>
                <?php if ($this->options->showCommentNum == 'on'):
                    if ($this->commentsNum == 0) echo "with ♥ on "; else echo "with " . $this->commentsNum . " comment(s) on";
                else: ?>
                    with ♥ on
                <?php endif; ?>
                <time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date('F j, Y'); ?></time> in <?php $this->category(', ', true, 'none'); ?></p>
        </div>
        <article class="posti">
            <?php $this->content(); ?>
        </article>
        <div>
            <ul class="post-copyright" style="margin: 0 0 0;">
                <li>
                    <strong>本文作者：</strong><?php $this->author(); ?>
                </li>
                <li>
                    <strong>发布时间：</strong><?php $this->date('F j, Y'); ?>
                </li>
                <li>
                    <strong>修改时间：</strong><?php echo date('F j, Y',$this->modified); ?>
                </li>
                <li>
                    <strong>阅读次数：</strong> <?php get_post_view($this) ?>
                </li>
                <li>
                    <strong>本文链接：</strong>
                    <a href="<?php $this->permalink() ?>" title="<?php $this->title() ?>"><?php $this->permalink() ?></a>
                </li>
                <li>
                    <strong>版权声明： </strong>
                    本博客所有文章除特别声明外，均采用 <a href="http://creativecommons.org/licenses/by-nc-sa/3.0/cn/" rel="external nofollow" target="_blank">CC BY-NC-SA 3.0 CN</a> 许可协议。转载请注明出处！
                </li>
            </ul>
        </div>
    </div>
</div>
<?php $this->need('footer.php'); ?>
