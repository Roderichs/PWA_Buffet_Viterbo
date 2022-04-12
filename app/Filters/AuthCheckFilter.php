<?php
    namespace App\Filters;

    use CodeIgniter\HTTP\RequestInterface;
    use CodeIgniter\HTTP\ResponseInterface;
    use CodeIgniter\Filters\FilterInterface;

    class AuthCheckFilter implements FilterInterface
    {
        public function before(RequestInterface $request, $arguments = null)
        {
            if(!session()->has('loggedUser')){
                return redirect()->to('/auth')->with('fail','You must be logged In!');
            }
        }

        public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
        {
            
        }
    }