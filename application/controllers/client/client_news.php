<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Client_news extends CI_Controller

 {
	function __construct() 
	{
       parent::__construct();
		$this->load->model('client/client_news_model');
    }

	public function news_view()
	{
	$data['country']=$this->client_news_model->get_all_news_country();
	
	$data['news_paper']=$this->client_news_model->get_all_news_paper();
	
	$data['news']=$this->client_news_model->get_all_news();
	//print_r($data['news']); 
	
		 $this->load->view(CLIENT_NEWS_VIEW, $data);

	}
	public function ajax_get_country_news_paper()
	{
	if($this->input->post('ajax') == '1') {
	$country_name = $this->input->post('country_name');
	
	$data['country_news_paper']=$this->client_news_model->get_all_country_news_paper($country_name);
	$data['country_news']=$this->client_news_model->get_all_country_news($country_name);
	
	?>
	<div class="tcol_darkblue f_18 mb10">Choose your news</div>
				<?php  foreach($data['country_news_paper'] as $newspapers) { ?>
                <div class="checkbox"> <label> <input type="checkbox" class="newscheck"  id="<?php echo $newspapers['source']; ?>" value="<?php echo $newspapers['source']; ?>"><?php echo $newspapers['source']; ?></label> </div><?php   } ?>
			<span>-</span>
				<?php foreach($data['country_news'] as $get_country_news_topic) {?><div class="row mb20">
      <div class="col-sm-3 col-md-3"> 
        <img src="<?php echo CLIENT_IMAGES; ?>news.jpg" class="img-responsive">
      </div>
      <div >
      <div class="col-sm-9 col-md-9"> 
          <div class="row">
            <h3 class="tcol_darkblue mt0"><a href="<?php echo $get_country_news_topic['link']; ?>" target="_blank"  style="display:inline;text-decoration:none" ><?php echo html_entity_decode( $get_country_news_topic['title'], ENT_QUOTES, "UTF-8"); ?></a> </h3>
            <div class="news_source"><?php echo $get_country_news_topic['source']; ?>  <span> <?php echo $get_country_news_topic['date_time']; ?></span></div>
            <div class="news_desc "> <?php echo html_entity_decode($get_country_news_topic['desc'], ENT_QUOTES, "UTF-8");  ?></div>
            
            </div>
      </div>
	   </div>
      </div>
	 <hr/>
		<?php }
	}
	}
	
	
	
	
	public function ajax_get_news_paper_topic()
	{
	if($this->input->post('ajax') == '1')
	{
	 $paper_name = $this->input->post('paper_name');
	 $country_name = $this->input->post('country_name');
	// print_r($paper_name); // die;
	$data['country_news_topic']=$this->client_news_model->get_news_paper_topic($paper_name,$country_name);
	
	 foreach($data['country_news_topic'] as $get_news_topic) {
	?>
	
	<div class="row mb20">
      <div class="col-sm-3 col-md-3"> 
        <img src="<?php echo CLIENT_IMAGES; ?>news.jpg" class="img-responsive">
      </div>
      <div >
      <div class="col-sm-9 col-md-9"> 
          <div class="row">
            <h3 class="tcol_darkblue mt0"><a href="<?php echo $get_news_topic['link']; ?>" target="_blank"  style="display:inline;text-decoration:none" ><?php echo html_entity_decode($get_news_topic['title'], ENT_QUOTES, "UTF-8");  ?></a> </h3>
            <div class="news_source"><?php echo $get_news_topic['source']; ?>  <span> <?php echo $get_news_topic['date_time']; ?></span></div>
            <div class="news_desc "> <?php echo html_entity_decode($get_news_topic['desc'], ENT_QUOTES, "UTF-8");; ?></div>
            
            </div>
      </div>
	   </div>
      </div>
	 <hr/>
	<?php 
	}
	}
  }
}
?>