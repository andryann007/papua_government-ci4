<?php

namespace App\Controllers;

use App\Models\AccountModel;
use App\Models\ContactModel;
use App\Models\NewsModel;
use App\Models\TravelModel;
use Myth\Auth\Password;

class Admin extends BaseController
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

    public function akun(): string
    {
        $data = [
            'title'     => 'Akun',
            'accounts'  => $this->modelAkun->getData()
        ];

        return view('admin/akun', $data);
    }

    public function save_akun()
    {
        if ($this->request->isAJAX()) {
            $valid = $this->validate([
                'namaUser' => [
                    'label' => 'Nama Lengkap User',
                    'rules' => 'required|is_unique[users.nama_lengkap]|max_length[30]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong !!!',
                        'is_unique' => '{field} tidak boleh sama !!!',
                        'max_length' => '{field} tidak boleh lebih dari 30 karakter !!!'
                    ]
                ],
                'username' => [
                    'label' => 'Username',
                    'rules' => 'required|is_unique[users.username]|min_length[8]|max_length[12]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong !!!',
                        'is_unique' => '{field} tidak boleh sama !!!',
                        'min_length' => '{field} tidak boleh kurang dari 8 karakter !!!',
                        'max_length' => '{field} tidak boleh lebih dari 12 karakter !!!'
                    ]
                ],
                'emailUser' => [
                    'label' => 'Email User',
                    'rules' => 'required|is_unique[users.email]|valid_email',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong !!!',
                        'is_unique' => '{field} tidak boleh sama !!!',
                        'valid_email' => '{field} tidak valid !!!'
                    ]
                ],
                'passUser' => [
                    'label' => 'Password User',
                    'rules' => 'required|min_length[8]|max_length[12]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong !!!',
                        'min_length' => '{field} tidak boleh kurang dari 8 karakter !!!',
                        'max_length' => '{field} tidak boleh lebih dari 12 karakter !!!'
                    ]
                ],
                'statusAkunUser' => [
                    'label' => 'Status Akun User',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong !!!',
                    ]
                ],
            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'nama_lengkap' => $this->validation->getError('namaUser'),
                        'username' => $this->validation->getError('username'),
                        'email' => $this->validation->getError('emailUser'),
                        'password' => $this->validation->getError('passUser'),
                        'active' => $this->validation->getError('statusAkunUser')
                    ]
                ];
            } else {
                $newPassword = $this->request->getPost('passUser');
                $strNewPassword = strval($newPassword);
                $newPasswordHash = Password::hash($strNewPassword);

                $data = array(
                    'nama_lengkap' => $this->request->getPost('namaUser'),
                    'email' => $this->request->getPost('emailUser'),
                    'username' => $this->request->getPost('username'),
                    'password_hash' => $newPasswordHash,
                    'active' => $this->request->getPost('statusAkunUser')
                );

                $this->modelAkun->saveData($data);

                $msg = [
                    'success' => 'Data Akun Berhasil Tersimpan, Silahkan Tentukan Grup User !!!'
                ];
            }
            echo json_encode($msg);
        }
    }

    public function update_akun()
    {
        $id = $this->request->getPost('idUser');

        if ($this->request->isAJAX()) {
            $valid = $this->validate([
                'editNamaUser' => [
                    'label' => 'Nama Lengkap User',
                    'rules' => 'required|max_length[30]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong !!!',
                        'max_length' => '{field} tidak boleh lebih dari 30 karakter !!!'
                    ]
                ],
                'editUsername' => [
                    'label' => 'Username',
                    'rules' => 'required|min_length[8]|max_length[12]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong !!!',
                        'min_length' => '{field} tidak boleh kurang dari 8 karakter !!!',
                        'max_length' => '{field} tidak boleh lebih dari 12 karakter !!!'
                    ]
                ],
                'editEmailUser' => [
                    'label' => 'Email User',
                    'rules' => 'required|valid_email',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong !!!',
                        'valid_email' => '{field} tidak valid !!!'
                    ]
                ],
                'editPassUser' => [
                    'label' => 'Password User',
                    'rules' => 'required|min_length[8]|max_length[12]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong !!!',
                        'min_length' => '{field} tidak boleh kurang dari 8 karakter !!!',
                        'max_length' => '{field} tidak boleh lebih dari 12 karakter !!!'
                    ]
                ],
                'editStatusAkunUser' => [
                    'label' => 'Status Akun User',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong !!!',
                    ]
                ],
            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'nama_lengkap' => $this->validation->getError('editNamaUser'),
                        'username' => $this->validation->getError('editUsername'),
                        'email' => $this->validation->getError('editEmailUser'),
                        'password' => $this->validation->getError('editPassUser'),
                        'is_active' => $this->validation->getError('editStatusAkunUser')
                    ]
                ];
            } else {
                $newPassword = $this->request->getPost('editPassUser');
                $strNewPassword = strval($newPassword);
                $newPasswordHash = Password::hash($strNewPassword);

                $data = array(
                    'nama_lengkap' => $this->request->getPost('editNamaUser'),
                    'email' => $this->request->getPost('editEmailUser'),
                    'username' => $this->request->getPost('editUsername'),
                    'password_hash' => $newPasswordHash,
                    'active' => $this->request->getPost('editStatusAkunUser')
                );

                $this->modelAkun->updateData($data, $id);

                $msg = [
                    'success' => 'Data Akun Berhasil Di Update !!!'
                ];
            }
            echo json_encode($msg);
        }
    }

    public function news(): string
    {
        $data = [
            'title'     => 'Berita',
            'news'      => $this->modelBerita->getData()
        ];

        return view('admin/news', $data);
    }

    public function save_news()
    {
        if ($this->request->isAJAX()) {
            $valid = $this->validate([
                'judulBerita' => [
                    'label' => 'Judul Berita',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong !!!'
                    ]
                ],
                'author' => [
                    'label' => 'Author Berita',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong !!!'
                    ]
                ],
                'kategoriBerita' => [
                    'label' => 'Kategori Berita',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong !!!'
                    ]
                ],
                'gambarBerita' => [
                    'label' => 'Gambar Berita',
                    'rules' => 'max_size[gambarBerita,2048]|mime_in[gambarBerita,image/png,image/jpg,image/jpeg,image/gif]|is_image[gambarBerita]',
                    'errors' => [
                        'max_size' => 'Ukuran dari {field} tidak boleh lebih dari 2 MB!!!',
                        'mime_in' => 'Jenis {field} yang diperbolehkan hanya jpg, jpeg, png, dan gif!!!',
                        'is_image' => '{field} yang diupload bukanlah gambar!!!'
                    ]
                ],
                'captionGambar' => [
                    'label' => 'Caption Gambar',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong !!!'
                    ]
                ],
                'deskripsiBerita' => [
                    'label' => 'Deskripsi Berita',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong !!!'
                    ]
                ]
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'judul' => $this->validation->getError('judulBerita'),
                        'author' => $this->validation->getError('author'),
                        'kategori' => $this->validation->getError('kategoriBerita'),
                        'gambar' => $this->validation->getError('gambarBerita'),
                        'caption' => $this->validation->getError('captionGambar'),
                        'desc' => $this->validation->getError('deskripsiBerita')
                    ]
                ];
            } else {
                $fileGambar = $this->request->getFile('gambarBerita');
                $namaGambar = $fileGambar->getName();
                $fileGambar->move('img/news', $namaGambar);

                $data = array(
                    'author' => $this->request->getPost('author'),
                    'kategori' => $this->request->getPost('kategoriBerita'),
                    'title' => $this->request->getPost('judulBerita'),
                    'gambar' => $namaGambar,
                    'caption_gambar' => $this->request->getPost('captionGambar'),
                    'deskripsi' => $this->request->getPost('deskripsiBerita')
                );

                $this->modelBerita->saveData($data);

                $msg = [
                    'success' => 'Data Berita Berhasil Tersimpan !!!'
                ];
            }
            echo json_encode($msg);
        }
    }

    public function update_news()
    {
        $id = $this->request->getPost('idBerita');

        if ($this->request->isAJAX()) {
            $valid = $this->validate([
                'judulBerita' => [
                    'label' => 'Judul Berita',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong !!!'
                    ]
                ],
                'author' => [
                    'label' => 'Author Berita',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong !!!'
                    ]
                ],
                'kategoriBerita' => [
                    'label' => 'Kategori Berita',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong !!!'
                    ]
                ],
                'gambarBerita' => [
                    'label' => 'Gambar Berita',
                    'rules' => 'max_size[gambarBerita,2048]|mime_in[gambarBerita,image/png,image/jpg,image/jpeg,image/gif]|is_image[gambarBerita]',
                    'errors' => [
                        'max_size' => 'Ukuran dari {field} tidak boleh lebih dari 2 MB!!!',
                        'mime_in' => 'Jenis {field} yang diperbolehkan hanya jpg, jpeg, png, dan gif!!!',
                        'is_image' => '{field} yang diupload bukanlah gambar!!!'
                    ]
                ],
                'captionGambar' => [
                    'label' => 'Caption Gambar',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong !!!'
                    ]
                ],
                'deskripsiBerita' => [
                    'label' => 'Deskripsi Berita',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong !!!'
                    ]
                ]
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'judul' => $this->validation->getError('judulBerita'),
                        'author' => $this->validation->getError('author'),
                        'kategori' => $this->validation->getError('kategoriBerita'),
                        'gambar' => $this->validation->getError('gambarBerita'),
                        'caption' => $this->validation->getError('captionGambar'),
                        'desc' => $this->validation->getError('deskripsiBerita')
                    ]
                ];
            } else {
                $fileGambar = $this->request->getFile('gambarBerita');
                $namaGambar = $fileGambar->getName();
                $fileGambar->move('img/news', $namaGambar);

                $data = array(
                    'author' => $this->request->getPost('author'),
                    'kategori' => $this->request->getPost('kategoriBerita'),
                    'title' => $this->request->getPost('judulBerita'),
                    'gambar' => $namaGambar,
                    'caption_gambar' => $this->request->getPost('captionGambar'),
                    'deskripsi' => $this->request->getPost('deskripsiBerita')
                );

                $this->modelBerita->updateData($data, $id);

                $msg = [
                    'success' => 'Data Berita Berhasil Diupdate !!!'
                ];
            }
            echo json_encode($msg);
        }
    }

    public function travel(): string
    {
        $data = [
            'title'     => 'Wisata',
            'travels'   => $this->modelTravel->getData()
        ];

        return view('admin/travel', $data);
    }

    public function save_travel()
    {
        if ($this->request->isAJAX()) {
            $valid = $this->validate([
                'namaTravel' => [
                    'label' => 'Nama Travel',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong !!!'
                    ]
                ],
                'author' => [
                    'label' => 'Author Travel',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong !!!'
                    ]
                ],
                'kategoriTravel' => [
                    'label' => 'Kategori Travel',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong !!!'
                    ]
                ],
                'gambarTravel' => [
                    'label' => 'Gambar Travel',
                    'rules' => 'max_size[gambarTravel,2048]|mime_in[gambarTravel,image/png,image/jpg,image/jpeg,image/gif]|is_image[gambarTravel]',
                    'errors' => [
                        'max_size' => 'Ukuran dari {field} tidak boleh lebih dari 2 MB!!!',
                        'mime_in' => 'Jenis {field} yang diperbolehkan hanya jpg, jpeg, png, dan gif!!!',
                        'is_image' => '{field} yang diupload bukanlah gambar!!!'
                    ]
                ],
                'captionGambar' => [
                    'label' => 'Caption Gambar',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong !!!'
                    ]
                ],
                'deskripsiTravel' => [
                    'label' => 'Deskripsi Travel',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong !!!'
                    ]
                ]
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'nama' => $this->validation->getError('namaTravel'),
                        'author' => $this->validation->getError('author'),
                        'kategori' => $this->validation->getError('kategoriTravel'),
                        'gambar' => $this->validation->getError('gambarTravel'),
                        'caption' => $this->validation->getError('captionGambar'),
                        'desc' => $this->validation->getError('deskripsiTravel')
                    ]
                ];
            } else {
                $fileGambar = $this->request->getFile('gambarTravel');
                $namaGambar = $fileGambar->getName();
                $fileGambar->move('img/travels', $namaGambar);

                $data = array(
                    'author' => $this->request->getPost('author'),
                    'kategori' => $this->request->getPost('kategoriTravel'),
                    'nama' => $this->request->getPost('namaTravel'),
                    'gambar' => $namaGambar,
                    'caption_gambar' => $this->request->getPost('captionGambar'),
                    'deskripsi' => $this->request->getPost('deskripsiTravel')
                );

                $this->modelTravel->saveData($data);

                $msg = [
                    'success' => 'Data Travel Berhasil Tersimpan !!!'
                ];
            }
            echo json_encode($msg);
        }
    }

    public function update_travel()
    {
        $id = $this->request->getPost('idTravel');

        if ($this->request->isAJAX()) {
            $valid = $this->validate([
                'editNamaTravel' => [
                    'label' => 'Nama Travel',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong !!!'
                    ]
                ],
                'editAuthor' => [
                    'label' => 'Author Travel',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong !!!'
                    ]
                ],
                'editKategoriTravel' => [
                    'label' => 'Kategori Travel',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong !!!'
                    ]
                ],
                'editGambarTravel' => [
                    'label' => 'Gambar Travel',
                    'rules' => 'max_size[editGambarTravel,2048]|mime_in[editGambarTravel,image/png,image/jpg,image/jpeg,image/gif]|is_image[editGambarTravel]',
                    'errors' => [
                        'max_size' => 'Ukuran dari {field} tidak boleh lebih dari 2 MB!!!',
                        'mime_in' => 'Jenis {field} yang diperbolehkan hanya jpg, jpeg, png, dan gif!!!',
                        'is_image' => '{field} yang diupload bukanlah gambar!!!'
                    ]
                ],
                'editCaptionGambar' => [
                    'label' => 'Caption Gambar',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong !!!'
                    ]
                ],
                'editDeskripsiTravel' => [
                    'label' => 'Deskripsi Travel',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong !!!'
                    ]
                ]
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'nama' => $this->validation->getError('editNamaTravel'),
                        'author' => $this->validation->getError('editAuthor'),
                        'kategori' => $this->validation->getError('editKategoriTravel'),
                        'gambar' => $this->validation->getError('editGambarTravel'),
                        'caption' => $this->validation->getError('editCaptionGambar'),
                        'desc' => $this->validation->getError('editDeskripsiTravel')
                    ]
                ];
            } else {
                $fileGambar = $this->request->getFile('editGambarTravel');
                $namaGambar = $fileGambar->getName();
                $fileGambar->move('img/travels', $namaGambar);

                $data = array(
                    'author' => $this->request->getPost('editAuthor'),
                    'kategori' => $this->request->getPost('editKategoriTravel'),
                    'nama' => $this->request->getPost('editNamaTravel'),
                    'gambar' => $namaGambar,
                    'caption_gambar' => $this->request->getPost('editCaptionGambar'),
                    'deskripsi' => $this->request->getPost('editDeskripsiTravel')
                );

                $this->modelTravel->updateData($data, $id);

                $msg = [
                    'success' => 'Data Travel Berhasil Di Update !!!'
                ];
            }
            echo json_encode($msg);
        }
    }

    public function contact(): string
    {
        $data = [
            'title'     => 'Contact Us',
            'contacts'   => $this->modelKontak->getData()
        ];

        return view('admin/contact', $data);
    }

    public function reply_message()
    {
        if ($this->request->isAJAX()) {
            $valid = $this->validate([
                'subjekEmail' => [
                    'label' => 'Subjek Email',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong !!!'
                    ]
                ],
                'pesanEmail' => [
                    'label' => 'Pesan Email',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong !!!'
                    ]
                ],
            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'email_subject' => $this->validation->getError('subjekEmail'),
                        'email_message' => $this->validation->getError('pesanEmail')
                    ]
                ];
            } else {
                $sender = "andryanace@gmail.com";
                $recipient = $this->request->getPost('emailPenerima');
                $subject = $this->request->getPost('subjekEmail');
                $message = $this->request->getPost('pesanEmail');

                $this->emailService->setFrom($sender, "Andryan");
                $this->emailService->setTo($recipient);
                $this->emailService->setSubject($subject);
                $this->emailService->setMessage($message);

                $success = $this->emailService->send();

                if ($success) {
                    $msg = [
                        'success' => 'Pesan Berhasil Terkirim !!!'
                    ];
                } else {
                    $msg = [
                        'error' => 'Pesan Gagal Dikirim !!!'
                    ];
                }
            }
            echo json_encode($msg);
        }
    }
}
