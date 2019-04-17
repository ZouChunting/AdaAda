<?php if (!defined('THINK_PATH')) exit();?>
                    <div class="col-md-6 left" id="contact_left">
                        <img class="img-responsive img-rabbit" src="/AdaAda/Public/Home/assetsForDev/images/contact.jpg">
                    </div>

                    <div class="col-md-6 right" id="contact_right">
                        <a href="#index" class="btn btn-rabbit back"> <i class="fa fa-angle-left" aria-hidden="true"></i> 返回 </a>
                        <div id="watermark">
                            <h2 class="page-title" text-center>发布游戏</h2>
                            <div class="marker">发</div>
                        </div>
                        <p class='subtitle'>为游戏而生，为乐趣而生。
                        </p>
                        <!-- form -->
                        <form class="form_edit" action="/AdaAda/index.php/Home/Dev/release"> 
                            <input type="hidden" name="developer_id" value="<?php echo ($_SESSION['developer_id']); ?>" />
                            <div class="form-group">
                                <input name="game_name" type="text" class="form-control" id="exampleInputName" placeholder="游戏名称">
                            </div>
                            
                            <div class="form-group">
                                <input name="game_pic" type="file" class="form-control" id="exampleInputName" placeholder="游戏截图">
                            </div>
                            
                            <div class="form-group">
                                <input name="game_package" type="file" class="form-control" id="exampleInputName" placeholder="游戏安装包">
                            </div>
                         
                            <div class="form-group">
                            <textarea name="game_des" class="form-control" rows="5" placeholder="游戏简介"></textarea>
                            </div>
                            <button type="submit" class="btn btn-rabbit submit">发布</button>
                        </form>
                    </div>