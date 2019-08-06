<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package King_Cabs
 */
?>
    <footer>
        <div class="footerup">
            <div class="container">
               <?php
                    $kingcabs_footer_top_title = get_theme_mod('kingcabs_footer_top_title');
                    $kingcabs_footer_top_button_title = get_theme_mod('kingcabs_footer_top_button_title');
                    $kingcabs_footer_top_button_url_title = get_theme_mod('kingcabs_footer_top_button_url_title');
                ?>

                <?php if( $kingcabs_footer_top_title || $kingcabs_footer_top_button_title || $kingcabs_footer_top_button_url_title ){ ?>
                <div class="call-to-action">

                    <h2>
                        <?php if($kingcabs_footer_top_title){ ?>
                            <span><strong><?php echo esc_html( $kingcabs_footer_top_title ); ?></strong></span>
                        <?php } ?>
                    </h2>

                    <?php if($kingcabs_footer_top_button_url_title){ ?>
                        <a href="<?php echo esc_url( $kingcabs_footer_top_button_url_title ); ?>" class="btn btn-primary pull-right">
                    <?php } ?>

                    <?php if($kingcabs_footer_top_button_title){ ?>
                        <i class="fa fa-chevron-right"></i> <?php echo esc_html($kingcabs_footer_top_button_title); ?> </a>
                    <?php } ?>
                    
                </div>
                <?php }?>
            </div>
        </div>


        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="row clearfix">

                        <?php if( is_active_sidebar( 'footer-1' ) ) : ?>
                        <div class="footer-column col-md-7 col-sm-6 col-xs-12">
                            <?php dynamic_sidebar( 'footer-1' ); ?>
                        </div>
                       <?php endif; ?>

                        <?php if( is_active_sidebar( 'footer-2' ) ) : ?>
                        <div class="footer-column col-md-5 col-sm-6 col-xs-12">
                            <?php dynamic_sidebar( 'footer-2' ); ?>
                        </div>
                        <?php endif; ?>     

                    </div>
                </div>

                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="row clearfix">

                        <?php if( is_active_sidebar( 'footer-3' ) ) : ?>
                        <div class="footer-column col-md-6 col-sm-6 col-xs-12">
                            <?php dynamic_sidebar( 'footer-3' ); ?>
                        </div>
                        <?php endif; ?>

                         <?php if( is_active_sidebar( 'footer-4' ) ) : ?>
                        <div class="footer-column col-md-6 col-sm-6 col-xs-12">
                           <?php dynamic_sidebar( 'footer-4' ); ?> 
                        </div>
                        <?php endif; ?>

                    </div>
                </div>

                <div class="footer-bottom">
                    <div class="col-md-6">
                        <div class="text text-left">&copy; <?php do_action( 'kingcabs_copyright', 5 ); ?><?= date("Y");?> - Todos os Direitos Reservados | Desenvolvido por <a href="http://www.agenciamidia9.com.br">Agência Mídia9</a></div>
                    </div>
                    <div class="col-md-6">
                        <ul class="social-links text-right">
                            <?php
                                $kingcabs_footer_follow_facebook = get_theme_mod('kingcabs_footer_follow_facebook');
                                $kingcabs_footer_follow_youtube = get_theme_mod('kingcabs_footer_follow_youtube');
                                $kingcabs_footer_follow_google = get_theme_mod('kingcabs_footer_follow_google');
                                $kingcabs_footer_follow_linkedin = get_theme_mod('kingcabs_footer_follow_linkedin');
                                $kingcabs_footer_follow_twitter = get_theme_mod('kingcabs_footer_follow_twitter');
                                $kingcabs_footer_follow_instagram = get_theme_mod('kingcabs_footer_follow_instagram');
                            ?>

                            <?php if($kingcabs_footer_follow_facebook){ ?>

                                <li><a href="<?php echo esc_url( $kingcabs_footer_follow_facebook ); ?>" aria-hidden="true"><i class="fa fa-facebook-official"></i></a></li>

                       		 <?php } if($kingcabs_footer_follow_instagram){ ?>

                                <li><a href="<?php echo esc_url($kingcabs_footer_follow_instagram); ?>" aria-hidden="true"><i class="fa fa-instagram"></i></a></li>
                            
                            <?php } if($kingcabs_footer_follow_twitter){ ?>
                                
                                <li><a href="<?php echo esc_url($kingcabs_footer_follow_twitter); ?>" aria-hidden="true"><i class="fa fa-twitter"></i></a></li>
                            
                            <?php }  if($kingcabs_footer_follow_youtube){ ?>

                                <li><a href="<?php echo esc_url($kingcabs_footer_follow_youtube); ?>" aria-hidden="true"><i class="fa fa-youtube"></i></a></li>
                            
                            <?php }  if($kingcabs_footer_follow_google){ ?>

                                <li><a href="<?php echo esc_url($kingcabs_footer_follow_google); ?>" aria-hidden="true"><i class="fa fa-google"></i></a></li>
                            
                            <?php } if($kingcabs_footer_follow_linkedin){ ?>

                                <li><a href="<?php echo esc_url($kingcabs_footer_follow_linkedin); ?>" aria-hidden="true"><i class="fa fa-linkedin"></i></a></li>
                            
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <a class="scroll-top fa fa-angle-up" href="javascript:void(0)"></a>

    <?php wp_footer();?>

 	<script type="text/javascript">
	   function mascara(o, f) {
	      v_obj = o
	      v_fun = f
	      setTimeout("execmascara()", 1)
	   }

	   function execmascara() {
	      v_obj.value = v_fun(v_obj.value)
	   }

	   function mtel(v) {
	      v = v.replace(/\D/g, "");
	      v = v.replace(/^(\d{2})(\d)/g, "($1) $2");
	      v = v.replace(/(\d)(\d{4})$/, "$1-$2");
	      return v;
	   }

	   function id(el) {
	      return document.getElementById(el);
	   }
	   window.onload = function() {
	      id('telefone').onkeyup = function() {
	         mascara(this, mtel);
	      }
	   }
	</script>
	<script src="//cdn.marketingmidia9.com.br/js/angular.min.js"></script>
	<script src="//cdn.marketingmidia9.com.br/js/angular-route.min.js"></script>
	<script src="//cdn.marketingmidia9.com.br/js/ngMask.min.js"></script>
	<script src="//cdn.marketingmidia9.com.br/js/ngDialog.min.js"></script>
	<script src="//cdn.marketingmidia9.com.br/js/sweetalert.min.js"></script>
	<script type="text/javascript">
	   angular.module('app', ['ngMask', 'ngDialog'])
	   .controller('Lead', function($scope, $log, $http, $location, ngDialog, $httpParamSerializerJQLike, $timeout, $filter) {
	      $log.warn($location.host());
	      $scope.load = false;
	      $scope.dados = {};
	      var host = '//crm2.marketingmidia9.com.br'
	      var registra_acesso = function(){
	         $http.get(host + '/api/registraAcesso/ukduRVtNaRW-E0XEAerpk7GRTe3dPtG8XfGxSkwFoAA')
	            .success(function(result){
	               $log.info(result);
	               $scope.request = result.data;
	            });
	      }

	      $scope.enviarLead = function(dados, tmp = null){
	         $scope.load = true;
	         dados.EMP_Key = $scope.request.EMP_Key;
	         // dados.EMP_Key  = 'F27PPqcdM4zg0n6SXaGrWUPCkK6LGc7za0ni_QBtiG8';
	         dados.LE_MetaDado = $scope.meta;
	         $log.info(dados);

	         $http({
	            method: 'POST',
	            url: host + '/api2/registraLead',
	            data: $httpParamSerializerJQLike(dados),
	            headers: {
	               'Content-Type': 'application/x-www-form-urlencoded'
	            }
	         })
	         .success(function(retorno){
	            $scope.load = false;
	            if (!retorno.error){
	               swal({
                     title: "Obrigado!",
                     text: "Suas informações foram enviadas com sucesso. Um de nossos colaboradores entrará em contato em breve",
                     type: "success",
                     confirmButtonColor: "#DD6B55",
                     confirmButtonText: "Ok",
                     closeOnConfirm: false
                  },
                  function(){
                     window.location.href = "https://www.facebook.com/orionkiafortaleza/";
                  });
	            } else {
	               swal("Ops!", "Ocorreu um problema ao enviar suas informações, tente novamente", "error");
	            }
	         })
	         .error(function(retorno){
	            $scope.load = false;
	            $log.error(retorno);
	         });

	      }

	      registra_acesso();
	   });
	</script>
</body>
</html>