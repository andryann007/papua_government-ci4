<?php

namespace App\Controllers;

use App\Models\AccountModel;
use App\Models\ContactModel;
use App\Models\NewsModel;
use App\Models\TravelModel;

class Home extends BaseController
{
    protected $modelAkun;
    protected $modelBerita;
    protected $modelTravel;
    protected $modelKontak;
    protected $validation;
    protected $emailService;

    public function __construct()
    {
        $this->modelAkun = new AccountModel();
        $this->modelBerita = new NewsModel();
        $this->modelTravel = new TravelModel();
        $this->modelKontak = new ContactModel();
        $this->validation = \Config\Services::validation();
        $this->emailService = \Config\Services::email();
    }

    public function index(): string
    {
        $data = [
            'title' => 'Home',
            'news' => $this->modelBerita->getSomeNews(),
            'travels' => $this->modelTravel->getSomeCarouselTravel()
        ];
        return view('public/index', $data);
    }

    public function about(): string
    {
        $data = [
            'title' => 'About',
            'foods' => $this->modelTravel->getSomeCardFood(),
            'travels' => $this->modelTravel->getSomeCardTravel()
        ];
        return view('public/about', $data);
    }

    public function services(): string
    {
        $data = [
            'title' => 'Services'
        ];
        return view('public/services', $data);
    }

    public function berita($kategori): string
    {
        $data = [
            'title' => 'Berita',
            'news' => $this->modelBerita->where(['kategori' => $kategori])->paginate(5, 'news'),
            'pager' => $this->modelBerita->where('kategori', $kategori)->pager

        ];

        return view('public/berita', $data);
    }

    public function detail_berita($kategori, $id)
    {
        $data = [
            'title' => 'Berita',
            'news' => $this->modelBerita->where('kategori', $kategori)->where('id', $id)->first(),
            'similar_news' => $this->modelBerita->where('kategori', $kategori)->paginate(3, 'news'),
            'pager' => $this->modelBerita->where('kategori', $kategori)->pager
        ];

        return view('public/detail_berita', $data);
    }

    public function wisata($kategori): string
    {
        $data = [
            'title' => 'Wisata',
            'kategori' => $kategori,
            'travels' => $this->modelTravel->where(['kategori' => $kategori])->paginate(9, 'travels'),
            'pager' => $this->modelTravel->where('kategori', $kategori)->pager

        ];

        return view('public/wisata', $data);
    }

    public function detail_wisata($kategori, $id)
    {
        $data = [
            'title' => 'Wisata',
            'travel' => $this->modelTravel->where('kategori', $kategori)->where('id', $id)->first(),
            'similar_travel' => $this->modelTravel->where('kategori', $kategori)->paginate(3, 'travels'),
            'pager' => $this->modelTravel->where('kategori', $kategori)->pager
        ];

        return view('public/detail_wisata', $data);
    }

    public function send_message()
    {
        if ($this->request->isAJAX()) {
            $valid = $this->validate([
                'nama' => [
                    'label' => 'Nama',
                    'rules' => 'required|max_length[30]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong !!!',
                        'max_length' => '{field} tidak boleh lebih dari 30 karakter !!!'
                    ]
                ],
                'email' => [
                    'label' => 'Email',
                    'rules' => 'required|valid_email',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong !!!',
                        'valid_email' => '{field} tidak valid !!!'
                    ]
                ],
                'subject' => [
                    'label' => 'Subyek',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong !!!'
                    ]
                ],
                'message' => [
                    'label' => 'Pesan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong !!!'
                    ]
                ],
            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'nama' => $this->validation->getError('nama'),
                        'subject' => $this->validation->getError('subject'),
                        'email' => $this->validation->getError('email'),
                        'message' => $this->validation->getError('message')
                    ]
                ];
            } else {
                $data = array(
                    'name' => $this->request->getPost('nama'),
                    'email' => $this->request->getPost('email'),
                    'subyek' => $this->request->getPost('subject'),
                    'pesan' => $this->request->getPost('message')
                );

                $saveData = $this->modelKontak->saveData($data);

                $recipient = "andryanace@gmail.com";
                $this->emailService->setFrom($this->request->getPost('email'), $this->request->getPost('nama'));
                $this->emailService->setTo($recipient);
                $this->emailService->setSubject($this->request->getPost('subject'));
                $this->emailService->setMessage($this->request->getPost('message'));

                $sendEmail = $this->emailService->send();

                if ($saveData & $sendEmail) {
                    $msg = [
                        'success' => 'Pesan Anda Berhasil Terkirim !!!'
                    ];
                } else if ($saveData & !$sendEmail) {
                    $msg = [
                        'error'     => 'Gagal Mengirim Pesan !!!'
                    ];
                } else {
                    $msg = [
                        'error'     => 'Gagal Mengirim & Menyimpan Pesan !!!'
                    ];
                }
            }
            echo json_encode($msg);
        }
    }
}
