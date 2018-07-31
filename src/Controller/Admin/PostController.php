<?php
namespace App\Controller\Admin;
use Cake\ORM\TableRegistry;
use App\Controller\AppController;

class PostController extends AppController
{

		public function initialize(){		
			  parent::initialize();			   							
		}
	
		public function index(){
			
			$posttype = $this->request->getParam('posttype');
			$this->set('posttype',$posttype);
			$termsList = [];
			foreach($this->themeConfig['Texonomies'] as $texonomyType=>$texonomyOption){
				if(in_array($posttype,$texonomyOption['type'])){	

					$termsList[$texonomyType] = TableRegistry::get('terms')->find('list')->contain(['child'])->where(['AND'=>['terms.texonomy'=>$texonomyType,'terms.post_type'=>$posttype]]);


				}
			}
			$this->set('termsList',$termsList);
			$this->paginate['conditions']['AND'][] = ['post.post_type'=>$posttype];
			parent::index();
		}
		public function add(){
			
			$Postmeta = TableRegistry::get('postmeta');
			$Seo = TableRegistry::get('Seo');
			$PostTerms = TableRegistry::get('postterms');			
			$posttype = $this->request->getParam('posttype');
				
			parent::add();	
				$saveedPost = $this->apiResponse['data'];
			if($this->request->is(['PUT']) or $this->request->is(['POST'])){
				
			
			
				
				if(isset($this->request->data['seo'])){
					$seoData = $this->request->data['seo'];
					$posttype = $this->request->data['post_type'];
				
					$seoData['post_id'] = $saveedPost->id;
					
					if($seoData['id']){
					$entity = $Seo->get($seoData['id']);
					}
					else{
							$entity = $Seo->newEntity();	
					}

					$patchEntity = $Seo->patchEntity($entity, $seoData, ['associated' => []]);
					$Seo->save($patchEntity);		
					
				}
				
				
				
				if($this->request->is(['PUT'])){
					$Postmeta->deleteAll(['Postmeta.post_id'=>$this->request->data['id']]);					
					$PostTerms->deleteAll(['Postterms.post_id'=>$this->request->data['id']]);					
				}
				
				
				if(isset($this->request->data['meta'])){
				
					$metaList = $this->request->data['meta'];
					//pr($metaList);
					
					foreach($metaList as $group => $fieldList){
						
						$postMeta = [];
						$postMeta['post_id'] = $saveedPost->id;
						$postMeta['meta_group'] = $group;
						foreach($fieldList as $key=>$value){
							if($value!="" and $value != null){
								
							$postMeta['meta_key'] = $key;
							$postMeta['meta_value'] = $value;
							
							$entity = $Postmeta->newEntity();
								$patchEntity = $Postmeta->patchEntity($entity, $postMeta, ['associated' => []]);
					
							$Postmeta->save($patchEntity);		
							}
							
						}
						
					}
				}
				
								
						
				$data = $this->request->data();
				if(isset($data['terms'])){
				
					foreach($data['terms'] as $texonomy=>$terms){
						
						if(isset($terms) and is_array($terms) and $terms!= ""){
					
							foreach($terms as $id=>$term){
								
									$postterm['term_id'] = $id;
									$postterm['post_id'] = $saveedPost->id;
									$postterm['texonomy'] = $texonomy;

									$entity = $PostTerms->newEntity();					
									$patchEntity = $PostTerms->patchEntity($entity, $postterm, ['associated' => []]);
									$PostTerms->save($patchEntity);
							}
						}
					}
				}
				
				
				$this->redirect(ADMIN_URL.'/posttype/'.$posttype);			 	
			}
			
			if($this->request->getParam('id')){
				$id = $this->request->getParam('id');
				$seo = $Seo->find()->where(['Seo.post_id'=>$id])->first();						
				$this->set('seo',$seo);
				
				$termsForPost = $PostTerms->find('list',['keyField' => 'id','valueField'=>'term_id'])->where(['Postterms.post_id'=>$id])->toArray();	
				
				
				$metaForPost = $Postmeta->find()->where(['Postmeta.post_id'=>$id])->order('Postmeta.meta_group ASC')->toArray();	
	
				$metaValue = [];
				foreach($metaForPost as $meta){
					
					$metaValue[$meta->meta_group][$meta->meta_key] = $meta->meta_value;
				}
				
			
				$this->set('metaValue',$metaValue);
				$this->set('termsForPost',$termsForPost);
			}
			
			$termsList = [];
			foreach($this->themeConfig['Texonomies'] as $texonomyType=>$texonomyOption){
				if(in_array($posttype,$texonomyOption['type'])){	

					$termsList[$texonomyType] = TableRegistry::get('terms')->find('treeList')->contain(['child'])->where(['AND'=>['terms.texonomy'=>$texonomyType,'terms.post_type'=>$posttype]]);


				}
			}
			$this->set('posttype',$posttype);
			$this->set('termsList',$termsList);
		}
	
		public function uploadImg($field){
				$this->image_size = [];
        $item = []; $item['name'] = 'icon'; $item['width'] = 64; $item['height'] = 64;$item['dimention']='w'; 
        $this->image_size[] = $item;
				$item['name'] = 'thumbnail'; $item['width'] = 350; $item['height'] = 360;$item['dimention']='w';
        $this->image_size[] = $item;
				$item['name'] = 'medium'; $item['width'] = 500; $item['height'] = 510;$item['dimention']='w'; 
        $this->image_size[] = $item;
			
			parent::uploadImg($field);
		}
	
	
}
