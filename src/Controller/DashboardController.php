<?php 

	namespace App\Controller;
    use App\Entity\Task;
    use App\Form\TaskType;
    use Knp\Component\Pager\PaginatorInterface;
    use App\Repository\TaskRepository;
    use Doctrine\Persistence\ManagerRegistry;
	use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\HttpFoundation\Request;
    use Twig\Environment;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\Routing\Annotation\Route;



    class DashboardController extends AbstractController{

        public function new (TaskRepository $repository,PaginatorInterface $paginator, Request $request,ManagerRegistry $doctrine) : Response{
            
            $task = new Task();
            $user = $this->getUser();

            $form = $this->createForm(TaskType::class,$task);
            $form->handleRequest($request);
            $entityManager = $doctrine->getManager();
            if ($form->isSubmitted() && $form->isValid() && $user) { 
                $task = $form->getData();
                // dd($user);
                $task->setUser($user);
                $entityManager->persist($task);
                $entityManager->flush();
                $this->addFlash(
                   'success',
                   'Tache add'
                );
                return $this->redirectToRoute('userProfil');
            }
            $tasks = $paginator->paginate(
                $repository->findByUser($user->getId()),
                $request->query->getInt('page',1),
                    4
                );
            return $this->render('pages/dashboard/home.html.twig',[
                'form' => $form->createView(),'tasks' => $tasks
            ]);
        }




        public function delete(ManagerRegistry $doctrine,TaskRepository $repository,int $id) : Response{
            $task = $repository->findOneBy(['id' => $id]);
            if (!$task) {
                $this->addFlash(
                'success',
                'Aucune tache'
            );
                return $this->redirectToRoute('userProfil');
            }
            $entityManager = $doctrine->getManager();
            $entityManager->remove($task);
            $entityManager->flush();
                $this->addFlash(
                    'success',
                    'Suppression effectuée'
                );
            return $this->redirectToRoute('userProfil');
        
        }



        public function edit(ManagerRegistry $doctrine,Request $request,TaskRepository $repository,int $id) : Response{

            $task = $repository->findOneBy(['id' => $id]);
            $form = $this->createForm(TaskType::class,$task);
            $form->handleRequest($request);
            $entityManager = $doctrine->getManager();

            if ($form->isSubmitted() && $form->isValid()) { 
                $task = $form->getData();
                $entityManager->persist($task);
                $entityManager->flush();
                $this->addFlash(
                   'success',
                   'Modification effectuée'
                );
                return $this->redirectToRoute('userProfil');
            }
            return $this->render('pages/edit.html.twig',[
            'form' => $form->createView()
        ]);
    }

    }




 ?>