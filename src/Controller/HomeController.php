<?php 

	namespace App\Controller;
    use App\Entity\List;
    use Doctrine\Persistence\ManagerRegistry;
	use Symfony\Component\HttpFoundation\Response;
    use Twig\Environment;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\Routing\Annotation\Route;



    class HomeController extends AbstractController{


    	public function index() : Response{

    		return $this->render('pages/home.html.twig');
    	}
    }




 ?>