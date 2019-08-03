<?php
namespace AppBundle\Controller;
use AppBundle\Entity\Events;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class EventsController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
    $events = $this->getDoctrine()->getRepository('AppBundle:Events')->findAll();
        return $this->render('files/index.html.twig', array('events'=>$events));
    }
    /**
     * @Route("/add", name="add")
     */
    public function addAction(Request $request){

    $newevent = new Events;

        $form = $this->createFormBuilder($newevent)
        ->add('name', TextType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))
        ->add('type', ChoiceType::class, array('choices'=>array('Music'=>'Music', 'Sport'=>'Sport', 'Theather'=>'Theather', 'Movie'=>'Movie'),'attr' => array('class'=> 'form-control', 'style'=>'margin-botton:15px')))
        ->add('description', TextType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))
        ->add('image', TextareaType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))
        ->add('email', TextareaType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))
        ->add('phone', TextareaType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))
        ->add('address', TextareaType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))
        ->add('url', TextareaType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))
        ->add('capacity', TextareaType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))
        ->add('dateTime', DateTimeType::class, array('attr' => array('style'=>'margin-bottom:15px')))
        ->add('save', SubmitType::class, array('label'=> 'Create Events', 'attr' => array('class'=> 'btn-primary', 'style'=>'margin-bottom:15px')))
        ->getForm();
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $name = $form['name']->getData();
            $type = $form['type']->getData();
            $description = $form['description']->getData();
            $image = $form['image']->getData();
            $email = $form['email']->getData();
            $phone = $form['phone']->getData();
            $address = $form['address']->getData();
            $url = $form['url']->getData();
            $capacity = $form['capacity']->getData();           
            $dateTime = $form['dateTime']->getData();

            $newevent->setName($name);
            $newevent->setType($type);
            $newevent->setDescription($description);
            $newevent->setImage($image);
            $newevent->setEmail($email);
            $newevent->setPhone($phone);
            $newevent->setAddress($address);
            $newevent->setUrl($url);
            $newevent->setCapacity($capacity);
            $newevent->setDateTime($dateTime);
           
            $em = $this->getDoctrine()->getManager();
            $em->persist($newevent);
            $em->flush();
            $this->addFlash(
                   'notice',
                   'events Added'
                   );
            return $this->redirectToRoute('homepage');
       }
       return $this->render('files/add.html.twig', array('form' => $form->createView()));
    }
    /**
     * @Route("/edit/{id}", name="edit")
     */
    public function editAction( $id, Request $request){

    $event = $this->getDoctrine()->getRepository('AppBundle:Events')->find($id);

        $event->setName($event->getName());
        $event->setType($event->getType());
        $event->setDescription($event->getDescription());
        $event->setImage($event->getImage());
        $event->setEmail($event->getEmail());
        $event->setAddress($event->getAddress());
        $event->setUrl($event->getUrl());
        $event->setCapacity($event->getCapacity());
        $event->setDateTime($event->getDateTime());
            
        $form = $this->createFormBuilder($event)
        ->add('name', TextType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))
        ->add('type', ChoiceType::class, array('choices'=>array('Music'=>'Music', 'Sport'=>'Sport', 'Theather'=>'Theather', 'Movie'=>'Movie'),'attr' => array('class'=> 'form-control', 'style'=>'margin-botton:15px')))
        ->add('description', TextType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))
        ->add('image', TextareaType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))
        ->add('email', TextareaType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))
        ->add('phone', TextareaType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))
        ->add('address', TextareaType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))
        ->add('url', TextareaType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))
        ->add('capacity', TextareaType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))
        ->add('dateTime', DateTimeType::class, array('attr' => array('style'=>'margin-bottom:15px')))
        ->add('save', SubmitType::class, array('label'=> 'Update Todo', 'attr' => array('class'=> 'btn-primary', 'style'=>'margin-botton:15px')))
        ->getForm();

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $name = $form['name']->getData();
            $type = $form['type']->getData();
            $description = $form['description']->getData();
            $image = $form['image']->getData();
            $email = $form['email']->getData();
            $phone = $form['phone']->getData();
            $address = $form['address']->getData();
            $url = $form['url']->getData();
            $capacity = $form['capacity']->getData();           
            $dateTime = $form['dateTime']->getData();
           
            $em = $this->getDoctrine()->getManager();
            $event = $em->getRepository('AppBundle:Events')->find($id);

            $event->setName($name);
            $event->setType($type);
            $event->setDescription($description);
            $event->setImage($image);
            $event->setEmail($email);
            $event->setPhone($phone);
            $event->setAddress($address);
            $event->setUrl($url);
            $event->setCapacity($capacity);
            $event->setDateTime($dateTime);
                   
            $em->flush();
            $this->addFlash(
                   'notice',
                   'Event Updated'
                   );
            return $this->redirectToRoute('homepage');
       }
       return $this->render('files/edit.html.twig', array('event' => $event, 'form' => $form->createView()));
    }
    /**
     * @Route("/view/{id}", name="view")
     */
    public function viewAction($id){
        $events = $this->getDoctrine()->getRepository('AppBundle:Events')->find($id);
        return $this->render('files/view.html.twig', array('events' => $events));
   }
    /**
     * @Route("/delete/{id}", name="delete")
     */
    public function deleteAction($id){
        $em = $this->getDoctrine()->getManager();
        $events = $em->getRepository('AppBundle:Events')->find($id);
        $em->remove($events);
        $em->flush();
        $this->addFlash(
           'notice',
           'Event Removed'
            );
        return $this->redirectToRoute('homepage');
    }
}
