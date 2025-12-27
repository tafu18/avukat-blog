<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class PracticeController extends Controller
{
    private static $practices = [
        'uluslararasi-ticaret-hukuku' => [
            'tr' => [
                'title' => 'Uluslararası Ticaret Hukuku',
                'seo_title' => 'Uluslararası Ticaret Hukuku Danışmanlığı | Tarık Taşdemir',
                'seo_desc' => 'İthalat, ihracat, gümrük işlemleri ve uluslararası sözleşmeler konusunda uzman hukuki danışmanlık hizmetleri.',
                'excerpt' => 'Sınır ötesi ticari faaliyetlerinizde riskleri minimize eden stratejik hukuki çözümler sunuyoruz.',
                'content' => 'Uluslararası ticaretin karmaşık yapısı, farklı hukuk sistemlerinin ve mevzuatların bir arada değerlendirilmesini gerektirir. Büromuz, uluslararası satış sözleşmeleri, distribütörlük anlaşmaları, akreditif işlemleri ve lojistik süreçlerde müvekkillerine kapsamlı danışmanlık hizmeti sunmaktadır. Ayrıca, uluslararası tahkim ve uyuşmazlık çözümü konularında da etkin temsil sağlamaktayız.',
                'faqs' => [
                    ['q' => 'Uluslararası satış sözleşmesi nasıl hazırlanmalı?', 'a' => 'Sözleşmelerde uygulanacak hukuk, yetkili mahkeme veya tahkim yeri, teslim şekilleri (Incoterms) ve ödeme yöntemleri açıkça belirtilmelidir.'],
                    ['q' => 'Yabancı bir şirketle yaşanan ticari alacak sorununda ne yapılmalı?', 'a' => 'Öncelikle sözleşmedeki uyuşmazlık çözüm maddesi incelenmeli, ardından uluslararası icra takibi veya tahkim süreci başlatılmalıdır.'],
                ]
            ],
            'en' => [
                'title' => 'International Trade Law',
                'seo_title' => 'International Trade Law Consultancy | Tarik Tasdemir',
                'seo_desc' => 'Expert legal consultancy services on import, export, customs procedures and international contracts.',
                'excerpt' => 'We offer strategic legal solutions that minimize risks in your cross-border commercial activities.',
                'content' => 'The complex nature of international trade requires the evaluation of different legal systems and regulations together. Our firm provides comprehensive consultancy services to its clients in international sales contracts, distributorship agreements, letter of credit transactions and logistics processes. We also provide effective representation in international arbitration and dispute resolution.',
                'faqs' => [
                    ['q' => 'How should an international sales contract be prepared?', 'a' => 'Applicable law, competent court or venue for arbitration, delivery terms (Incoterms) and payment methods must be clearly stated in contracts.'],
                    ['q' => 'What should be done in case of a commercial receivable problem with a foreign company?', 'a' => 'First, the dispute resolution clause in the contract should be examined, then international enforcement proceedings or arbitration process should be initiated.'],
                ]
            ],
            'icon' => '<svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>',
        ],
        'ticaret-hukuku' => [
            'tr' => [
                'title' => 'Ticaret Hukuku',
                'seo_title' => 'Şirketler ve Ticaret Hukuku Avukatı | Tarık Taşdemir',
                'seo_desc' => 'Şirket kuruluşu, birleşme ve devralmalar, ticari sözleşmeler ve kurumsal yönetim danışmanlığı.',
                'excerpt' => 'İşletmenizin hukuki altyapısını güçlendiren, ticari hedeflerinize uygun profesyonel destek.',
                'content' => 'Ticaret hukuku pratiğimiz, günlük ticari operasyonlardan karmaşık kurumsal işlemlere kadar geniş bir yelpazeyi kapsar. Şirket esas sözleşmelerinin hazırlanması, genel kurul süreçlerinin yönetimi, haksız rekabet davaları ve kıymetli evrak hukuku konularında müvekkillerimize stratejik rehberlik ediyoruz.',
                'faqs' => [
                    ['q' => 'Limited şirket mi Anonim şirket mi kurmalıyım?', 'a' => 'Sermaye yapısı, ortak sayısı ve sorumluluk rejimi açısından hedeflerinize en uygun şirket türünü analiz ederek belirliyoruz.'],
                    ['q' => 'Ticari sözleşmelerde nelere dikkat edilmeli?', 'a' => 'Tarafların hak ve yükümlülükleri, cezai şartlar, fesih koşulları ve gizlilik hükümleri detaylıca düzenlenmelidir.'],
                ]
            ],
            'en' => [
                'title' => 'Commercial Law',
                'seo_title' => 'Corporate and Commercial Law Attorney | Tarik Tasdemir',
                'seo_desc' => 'Company formation, mergers and acquisitions, commercial contracts and corporate governance consultancy.',
                'excerpt' => 'Professional support that strengthens the legal infrastructure of your business and suits your commercial goals.',
                'content' => 'Our commercial law practice covers a wide range from daily commercial operations to complex corporate transactions. We provide strategic guidance to our clients in the preparation of company articles of association, management of general assembly processes, unfair competition lawsuits and negotiable instruments law.',
                'faqs' => [
                    ['q' => 'Should I establish a Limited Liability Company or a Joint Stock Company?', 'a' => 'We determine the company type that best suits your goals in terms of capital structure, number of partners and liability regime.'],
                    ['q' => 'What should be considered in commercial contracts?', 'a' => 'Rights and obligations of the parties, penal clauses, termination conditions and confidentiality provisions should be regulated in detail.'],
                ]
            ],
            'icon' => '<svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" /></svg>',
        ],
        'gayrimenkul-hukuku' => [
            'tr' => [
                'title' => 'Gayrimenkul Hukuku',
                'seo_title' => 'Gayrimenkul Hukuku ve Tapu Davaları | Tarık Taşdemir',
                'seo_desc' => 'Tapu iptal ve tescil, kira davaları, kamulaştırma ve gayrimenkul yatırım danışmanlığı.',
                'excerpt' => 'Mülkiyet haklarınızın korunması ve gayrimenkul yatırımlarınızın hukuki güvenliği için yanınızdayız.',
                'content' => 'Gayrimenkul hukuku alanında, taşınmaz alım-satım süreçlerinin yönetimi, ipotek ve rehin işlemleri, kat karşılığı inşaat sözleşmeleri ve kentsel dönüşüm süreçlerinde hizmet vermekteyiz. Ayrıca, yabancıların Türkiye\'de mülk edinimi konusundaki yasal prosedürleri titizlikle yürütüyoruz.',
                'faqs' => [
                    ['q' => 'Yabancılar Türkiye\'de her yerden mülk alabilir mi?', 'a' => 'Askeri güvenlik bölgeleri hariç olmak üzere, mütekabiliyet şartı aranmaksızın birçok bölgeden mülk edinilebilir.'],
                    ['q' => 'Tapu iptal davası ne kadar sürer?', 'a' => 'Davanın niteliğine ve delil durumuna göre değişmekle birlikte, ortalama 1-2 yıl sürebilmektedir.'],
                ]
            ],
            'en' => [
                'title' => 'Real Estate Law',
                'seo_title' => 'Real Estate Law and Title Deed Lawsuits | Tarik Tasdemir',
                'seo_desc' => 'Title deed cancellation and registration, rental lawsuits, expropriation and real estate investment consultancy.',
                'excerpt' => 'We stand by you for the protection of your property rights and the legal security of your real estate investments.',
                'content' => 'In the field of real estate law, we provide services in the management of real estate purchase and sale processes, mortgage and pledge transactions, construction contracts in return for land share and urban transformation processes. We also meticulously carry out legal procedures regarding property acquisition by foreigners in Turkey.',
                'faqs' => [
                    ['q' => 'Can foreigners buy property anywhere in Turkey?', 'a' => 'Apart from military security zones, property can be acquired in many regions without seeking reciprocity condition.'],
                    ['q' => 'How long does a title deed cancellation lawsuit take?', 'a' => 'Depending on the nature of the case and the status of evidence, it may take 1-2 years on average.'],
                ]
            ],
            'icon' => '<svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" /></svg>',
        ],
        'yatirim-danismanligi' => [
            'tr' => [
                'title' => 'Yatırım Danışmanlığı',
                'seo_title' => 'Türkiye\'de Yatırım Hukuku Danışmanlığı | Tarık Taşdemir',
                'seo_desc' => 'Yabancı yatırımcılar için şirket kurulumu, teşvikler ve hukuki risk analizi hizmetleri.',
                'excerpt' => 'Yatırımlarınızı doğru yönlendirerek hukuki riskleri ortadan kaldırıyor, kazancınızı güvence altına alıyoruz.',
                'content' => 'Türkiye\'de yatırım yapmak isteyen yerli ve yabancı girişimciler için pazar analizi, hukuki uygunluk denetimi (due diligence) ve yatırım teşvikleri konularında danışmanlık sağlıyoruz. Vergi hukuku ve iş hukuku boyutlarıyla entegre bir hizmet sunarak, yatırımınızın sürdürülebilirliğini hedefliyoruz.',
                'faqs' => [
                    ['q' => 'Yabancı yatırımcılar için hangi teşvikler var?', 'a' => 'KDV istisnası, gümrük vergisi muafiyeti ve vergi indirimleri gibi birçok bölgesel ve sektörel teşvik bulunmaktadır.'],
                    ['q' => 'Şirket kurmadan yatırım yapılabilir mi?', 'a' => 'Bazı yatırım türleri (örn. gayrimenkul veya borsa) için şirket kurmak zorunlu değildir, ancak ticari faaliyet için önerilir.'],
                ]
            ],
            'en' => [
                'title' => 'Investment Consulting',
                'seo_title' => 'Investment Law Consultancy in Turkey | Tarik Tasdemir',
                'seo_desc' => 'Company formation, incentives and legal risk analysis services for foreign investors.',
                'excerpt' => 'We guide your investments correctly, eliminating legal risks and securing your earnings.',
                'content' => 'We provide consultancy on market analysis, due diligence and investment incentives for local and foreign entrepreneurs who want to invest in Turkey. By offering an integrated service with tax law and labor law dimensions, we aim for the sustainability of your investment.',
                'faqs' => [
                    ['q' => 'What incentives are there for foreign investors?', 'a' => 'There are many regional and sectoral incentives such as VAT exemption, customs duty exemption and tax reductions.'],
                    ['q' => 'Can investment be made without establishing a company?', 'a' => 'For some investment types (e.g. real estate or stock exchange), establishing a company is not mandatory, but recommended for commercial activity.'],
                ]
            ],
            'icon' => '<svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" /></svg>',
        ],
        'turk-vatandasligi-hukuku' => [
            'tr' => [
                'title' => 'Türk Vatandaşlığı Hukuku',
                'seo_title' => 'Yatırım Yoluyla Türk Vatandaşlığı Avukatı | Tarık Taşdemir',
                'seo_desc' => 'Gayrimenkul yatırımı, banka mevduatı veya istihdam yoluyla Türk vatandaşlığı kazanımı işlemleri.',
                'excerpt' => 'Vatandaşlık başvuru süreçlerinizi hızlı ve hatasız bir şekilde sonuçlandırıyoruz.',
                'content' => 'Türk Vatandaşlığı Kanunu kapsamında, istisnai yolla vatandaşlık kazanımı süreçlerini yönetiyoruz. 400.000 USD tutarında gayrimenkul satın alma veya 500.000 USD banka mevduatı gibi yatırım şartlarının sağlanmasından, ikamet izni alınması ve nihai vatandaşlık başvurusuna kadar tüm süreci takip ediyoruz.',
                'faqs' => [
                    ['q' => 'Vatandaşlık süreci ne kadar sürer?', 'a' => 'Yatırımın tamamlanmasının ardından başvuru süreci genellikle 3-6 ay içerisinde sonuçlanmaktadır.'],
                    ['q' => 'Vatandaşlık aldıktan sonra mülkü satabilir miyim?', 'a' => 'Vatandaşlık kazanımı için satın alınan mülklerin tapusuna 3 yıl satılamaz şerhi konulmaktadır. 3 yılın sonunda satılabilir.'],
                ]
            ],
            'en' => [
                'title' => 'Turkish Citizenship Law',
                'seo_title' => 'Turkish Citizenship by Investment Attorney | Tarik Tasdemir',
                'seo_desc' => 'Procedures for acquiring Turkish citizenship through real estate investment, bank deposit or employment.',
                'excerpt' => 'We conclude your citizenship application processes quickly and without errors.',
                'content' => 'Within the scope of the Turkish Citizenship Law, we manage the processes of acquiring citizenship through exceptional means. We follow the entire process from meeting investment conditions such as purchasing real estate worth 400,000 USD or depositing 500,000 USD in a bank, to obtaining a residence permit and final citizenship application.',
                'faqs' => [
                    ['q' => 'How long does the citizenship process take?', 'a' => 'After the investment is completed, the application process is usually concluded within 3-6 months.'],
                    ['q' => 'Can I sell the property after obtaining citizenship?', 'a' => 'A notation stating that the property cannot be sold for 3 years is placed on the title deed of the properties purchased for citizenship acquisition. It can be sold at the end of 3 years.'],
                ]
            ],
            'icon' => '<svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>',
        ]
    ];

    public function index()
    {
        // Return all practices with their full data structure, adding the slug to each for convenience
        $practices = self::$practices;
        foreach($practices as $slug => &$practice) {
            $practice['slug'] = $slug;
        }

        return view('practices.index', ['practices' => $practices]);
    }

    public function show($slug)
    {
        if (!array_key_exists($slug, self::$practices)) {
            abort(404);
        }

        $practice = self::$practices[$slug];
        $practice['slug'] = $slug; // Inject slug for view usage if needed
        
        return view('practices.show', compact('practice'));
    }
}
