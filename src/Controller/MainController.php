<?php

namespace App\Controller;

use App\Entity\Leads;
use App\repository\LeadsRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class MainController extends AbstractController
{
    #[Route('/main', name: 'app_main')]
    public function index(LeadsRepository $leadsRepository): JsonResponse
    {
       
        $leads = $leadsRepository->transformAll();

        return $this->json($leads);

    }
    /**
     * @Route("/new/", name="add_customer", methods={"POST"})
     */
    public function add( $request): JsonResponse
{
       $data= json_decode($request->getContent(), true);
        $Name = $data['lastName'];
        $phone_number = $data['phoneNumber'];
        $email_id = $data['email'];      
        $this->customerRepository->saveCustomer($Name,$phone_number,$email_id);

 if (empty($firstName) || empty($lastName) || empty($email) || empty($phoneNumber)) {
            throw new NotFoundHttpException('Expecting mandatory parameters!');
        }
        return new JsonResponse(['status' => 'leads created!']);

    return $this->json('index.html.twig');
    }

    /**
 * @Route("/main{id}", name="leads_get_one", methods={"GET"})
 */
public function get($id): JsonResponse
{
    $customer = $this->customerRepository->findOneBy(['id' => $id]);

    $data = [
        'id' => $customer->getId(),
        'Name' => $customer->getFirstName(),      
        'email_id' => $customer->getEmail(),
        'phone_number' => $customer->getPhoneNumber(),
    ];

    return new JsonResponse($data);

    return $this->json('show.html.twig');
}

/**
 * @Route("/upadate/{id}", name="update_leads", methods={"PUT"})
 */
public function update($id, $request): JsonResponse
{
    $customer = $this->customerRepository->findOneBy(['id' => $id]);
    $data = json_decode($request->getContent(), true);

   
    empty($data['Name']) ? true : $customer->setLastName($data['lastName']);
    empty($data['email']) ? true : $customer->setEmail($data['email']);
    empty($data['phoneNumber']) ? true : $customer->setPhoneNumber($data['phoneNumber']);

    $updatedCostumer = $this->customerRepository->updateCustomer($customer);

    return new JsonResponse($updatedCostumer->toArray());


    return $this->json('update.html.twig');
}


}

