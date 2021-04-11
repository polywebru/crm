<?php

namespace Database\Seeders;

use App\Models\Faculty;
use App\Models\Speciality;
use Illuminate\Database\Seeder;

class FacultiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $facultiesAndSpecialities = [
            'Факультет информационных технологий' => [
                [
                    'code' => '01.03.02',
                    'name' => 'Прикладная математика и информатика',
                    'profile' => 'Большие и открытые данные',
                ],
                [
                    'code' => '09.03.01',
                    'name' => 'Информатика и вычислительная техника',
                    'profile' => 'Веб-технологии',
                ],
                [
                    'code' => '09.03.01',
                    'name' => 'Информатика и вычислительная техника',
                    'profile' => 'Интеграция и программирование в САПР',
                ],
                [
                    'code' => '09.03.01',
                    'name' => 'Информатика и вычислительная техника',
                    'profile' => 'Программное обеспечение информационных систем',
                ],
                [
                    'code' => '09.03.01',
                    'name' => 'Информатика и вычислительная техника',
                    'profile' => 'Киберфизические системы',
                ],
                [
                    'code' => '09.03.03',
                    'name' => 'Прикладная информатика',
                    'profile' => 'Большие и открытые данные',
                ],
                [
                    'code' => '09.03.03',
                    'name' => 'Прикладная информатика',
                    'profile' => 'Корпоративные информационные системы',
                ],
                [
                    'code' => '10.03.01',
                    'name' => 'Информационная безопасность',
                    'profile' => null,
                ],
                [
                    'code' => '10.05.03',
                    'name' => 'Информационная безопасность автоматизированных систем',
                    'profile' => null,
                ],
                [
                    'code' => '01.04.02',
                    'name' => 'Прикладная математика и информатика',
                    'profile' => 'Системная аналитика больших данных',
                ],
                [
                    'code' => '09.04.01',
                    'name' => 'Информатика и вычислительная техника',
                    'profile' => 'Компьютерная лингвистика и ИИ',
                ],
                [
                    'code' => '09.04.01',
                    'name' => 'Информатика и вычислительная техника',
                    'profile' => 'Медицинские интеллектуальные системы',
                ],
                [
                    'code' => '10.04.01',
                    'name' => 'Информационная безопасность',
                    'profile' => 'Информационная безопасность веб-приложений и облачных технологий',
                ],
                [
                    'code' => '27.04.04',
                    'name' => 'Управление в технических системах',
                    'profile' => 'Роботизированные информационные системы',
                ],
                [
                    'code' => '27.04.04',
                    'name' => 'Управление в технических системах',
                    'profile' => 'Эргономический анализ интерфейсов и перспективных технических систем',
                ],
                [
                    'code' => '27.04.04',
                    'name' => 'Управление в технических системах',
                    'profile' => 'Роботизированные беспилотные системы и эргономика',
                ],
            ],
            'Институт принтмедиа и информационных технологий' => [
                [
                    'code' => '09.03.02',
                    'name' => 'Информационные системы и технологии',
                    'profile' => 'Информационные системы и технологии обработки цифрового контента',
                ],
                [
                    'code' => '09.03.02',
                    'name' => 'Информационные системы и технологии',
                    'profile' => 'Информационные и автоматизированные системы обработки информации и управления',
                ],
                [
                    'code' => '09.03.02',
                    'name' => 'Информационные системы и технологии',
                    'profile' => 'Информационные технологии в медиаиндустрии и дизайне',
                ],
                [
                    'code' => '09.03.02',
                    'name' => 'Информационные системы и технологии',
                    'profile' => 'Технологии дополненной и виртуальной реальности в медиаинсдустрии',
                ],
                [
                    'code' => '09.03.02',
                    'name' => 'Информационные системы и технологии',
                    'profile' => 'Программное обеспечение игровой компьютерной индустрии',
                ],
                [
                    'code' => '09.03.02',
                    'name' => 'Информационные системы и технологии',
                    'profile' => 'Гибридные технологии умного дома и интернет вещей',
                ],
                [
                    'code' => '09.03.02',
                    'name' => 'Информационные системы и технологии',
                    'profile' => 'Информационные системы автоматизированных комплексов медиаиндустрии',
                ],
                [
                    'code' => '09.03.02',
                    'name' => 'Информационные системы и технологии',
                    'profile' => 'Цифровая информация',
                ],
                [
                    'code' => '15.03.02',
                    'name' => 'Технологические машины и оборудование',
                    'profile' => 'Оборудование упаковочного и полиграфического производства',
                ],
                [
                    'code' => '22.03.01',
                    'name' => 'Материаловедение и технологии материалов',
                    'profile' => 'Современные материалы для защиты от фальсификации',
                ],
                [
                    'code' => '22.03.01',
                    'name' => 'Материаловедение и технологии материалов',
                    'profile' => 'Материаловедение и защитные технологии',
                ],
                [
                    'code' => '27.03.02',
                    'name' => 'Управление качеством',
                    'profile' => 'Управление качеством в принтмедиа',
                ],
                [
                    'code' => '29.03.03',
                    'name' => 'Технология полиграфического и упаковочного производства',
                    'profile' => 'Технология полиграфического производства',
                ],
                [
                    'code' => '29.03.03',
                    'name' => 'Технология полиграфического и упаковочного производства',
                    'profile' => 'Дизайн и технология создания упаковки',
                ],
                [
                    'code' => '29.03.03',
                    'name' => 'Технология полиграфического и упаковочного производства',
                    'profile' => 'Технологии упаковочного производства',
                ],
                [
                    'code' => '29.03.03',
                    'name' => 'Технология полиграфического и упаковочного производства',
                    'profile' => 'Бизнес-процессы печатной и упаковочной индустрии',
                ],
                [
                    'code' => '29.03.03',
                    'name' => 'Технология полиграфического и упаковочного производства',
                    'profile' => 'Ресурсное обеспечение печатной и упаковочной индустрии',
                ],
                [
                    'code' => '29.03.03',
                    'name' => 'Технология полиграфического и упаковочного производства',
                    'profile' => 'Дизайн и проектирование мультимедиа и визуального контента',
                ],
                [
                    'code' => '09.04.02',
                    'name' => 'Информационные системы и технологии',
                    'profile' => 'Интеллектуальные технологии обработки цифрового контента',
                ],
                [
                    'code' => '09.04.02',
                    'name' => 'Информационные системы и технологии',
                    'profile' => 'Технологии смешанной реальности',
                ],
                [
                    'code' => '09.04.02',
                    'name' => 'Информационные системы и технологии',
                    'profile' => 'Мобильные технологии',
                ],
                [
                    'code' => '15.04.02',
                    'name' => 'Технологические машины и оборудование',
                    'profile' => 'Маркетинг и бизнес-планирование упаковочного и полиграфического производства',
                ],
                [
                    'code' => '15.04.02',
                    'name' => 'Технологические машины и оборудование',
                    'profile' => 'Проектирование и организация полиграфического производства',
                ],
                [
                    'code' => '15.04.04',
                    'name' => 'Автоматизация технологических процессов и производств',
                    'profile' => 'Компьютерные системы сбора и обработки данных в принтмедиаиндустрии',
                ],
                [
                    'code' => '22.04.01',
                    'name' => 'Материаловедение и технологии материалов',
                    'profile' => 'Полиграфические и упаковочные материалы и технологии',
                ],
                [
                    'code' => '27.04.02',
                    'name' => 'Управление качеством',
                    'profile' => 'Управление качеством в индустрии печатной электроники и упаковки',
                ],
                [
                    'code' => '27.04.02',
                    'name' => 'Управление качеством',
                    'profile' =>
                        'Проектирование моделей кадрового обеспечения высокотехнологичных проектов и производств',
                ],
                [
                    'code' => '29.04.03',
                    'name' => 'Технология полиграфического и упаковочного производства',
                    'profile' => 'Полиграфические технологии в нано- и микроэлектронике',
                ],
            ],
            'Институт издательского дела и журналистики' => [
                [
                    'code' => '42.03.02',
                    'name' => 'Журналистика',
                    'profile' => 'Периодические издания и мультимедийная журналистика',
                ],
                [
                    'code' => '42.03.03',
                    'name' => 'Издательское дело',
                    'profile' => 'Книгоиздательское дело',
                ],
                [
                    'code' => '42.03.03',
                    'name' => 'Издательское дело',
                    'profile' => 'Газетно-журнальное издательское дело',
                ],
                [
                    'code' => '42.04.02',
                    'name' => 'Журналистика',
                    'profile' => 'Мультимедийная журналистика',
                ],
                [
                    'code' => '42.04.03',
                    'name' => 'Издательское дело',
                    'profile' => 'Современный издательский процесс: инновационные практики',
                ],
            ],
            'Факультет экономики и управления' => [
                [
                    'code' => '38.03.01',
                    'name' => 'Экономика',
                    'profile' => 'Экономика и финансы предприятия',
                ],
                [
                    'code' => '38.03.01',
                    'name' => 'Экономика',
                    'profile' => 'Бухгалтерский учет, анализ и аудит',
                ],
                [
                    'code' => '38.03.02',
                    'name' => 'Менеджмент',
                    'profile' => 'Управление организацией',
                ],
                [
                    'code' => '38.03.02',
                    'name' => 'Менеджмент',
                    'profile' => 'Менеджмент организации',
                ],
                [
                    'code' => '38.03.02',
                    'name' => 'Менеджмент',
                    'profile' => 'Управление проектами',
                ],
                [
                    'code' => '38.03.02',
                    'name' => 'Менеджмент',
                    'profile' => 'Медиаменеджмент',
                ],
                [
                    'code' => '38.03.02',
                    'name' => 'Менеджмент',
                    'profile' => 'Управление бизнес-процессами',
                ],
                [
                    'code' => '38.03.04',
                    'name' => 'Государственное и муниципальное управление',
                    'profile' => 'Государственное и муниципальное управление',
                ],
                [
                    'code' => '38.03.04',
                    'name' => 'Государственное и муниципальное управление',
                    'profile' => 'Управление в высокотехнологичном муниципалитете',
                ],
                [
                    'code' => '38.03.04',
                    'name' => 'Государственное и муниципальное управление',
                    'profile' => 'Государственное управление и правовое регулирование',
                ],
                [
                    'code' => '38.03.01',
                    'name' => 'Экономика',
                    'profile' => 'Economics and Finance of an Enterprise',
                ],
                [
                    'code' => '38.03.03',
                    'name' => 'Управление персоналом',
                    'profile' => 'Стратегическое управление человеческими ресурсами',
                ],
                [
                    'code' => '38.03.03',
                    'name' => 'Управление персоналом',
                    'profile' => 'Управление развитием персонала',
                ],
                [
                    'code' => '38.03.03',
                    'name' => 'Управление персоналом',
                    'profile' => 'Управление персоналом',
                ],
                [
                    'code' => '38.03.03',
                    'name' => 'Управление персоналом',
                    'profile' => 'Управление персоналом в технологических компаниях',
                ],
                [
                    'code' => '42.03.01',
                    'name' => 'Реклама и связи с общественностью',
                    'profile' => 'Реклама и связи с общественностью в цифровых медиа',
                ],
                [
                    'code' => '42.03.01',
                    'name' => 'Реклама и связи с общественностью',
                    'profile' => 'Интегрированные бренд-коммуникации',
                ],
                [
                    'code' => '42.03.01',
                    'name' => 'Реклама и связи с общественностью',
                    'profile' => 'Бренд-менеджмент в рекламе и связях с общественностью',
                ],
                [
                    'code' => '42.03.01',
                    'name' => 'Реклама и связи с общественностью',
                    'profile' => 'Индустриальный брендинг',
                ],
                [
                    'code' => '27.04.02',
                    'name' => 'Управление качеством',
                    'profile' => 'Управление бизнес-процессами',
                ],
                [
                    'code' => '27.04.02',
                    'name' => 'Управление качеством',
                    'profile' => 'Управление человеческим капиталом',
                ],
                [
                    'code' => '27.04.02',
                    'name' => 'Управление качеством',
                    'profile' => 'Управление бизнес-системами',
                ],
                [
                    'code' => '27.04.02',
                    'name' => 'Управление качеством',
                    'profile' => 'Управление качеством человеческого капитала',
                ],
                [
                    'code' => '27.04.04',
                    'name' => 'Управление в технических системах',
                    'profile' => 'Logistics and Supply Chain Management',
                ],
                [
                    'code' => '42.04.01',
                    'name' => 'Реклама и связи с общественность',
                    'profile' => 'Технологии анализа медиасферы',
                ],
                [
                    'code' => '42.04.01',
                    'name' => 'Реклама и связи с общественность',
                    'profile' => 'Коммуникационные технологии в медиабизнесе',
                ],
                [
                    'code' => '42.04.01',
                    'name' => 'Реклама и связи с общественность',
                    'profile' => 'Реклама и связи с общественностью',
                ],
                [
                    'code' => '42.04.01',
                    'name' => 'Реклама и связи с общественность',
                    'profile' => 'Связи с общественностью в органах власти',
                ],
                [
                    'code' => '42.04.01',
                    'name' => 'Реклама и связи с общественность',
                    'profile' => 'Инновационный маркетинг в рекламе',
                ],
                [
                    'code' => '42.04.01',
                    'name' => 'Реклама и связи с общественность',
                    'profile' => 'Innovative Marketing in Advertising',
                ],
                [
                    'code' => '42.04.01',
                    'name' => 'Реклама и связи с общественность',
                    'profile' => 'Рекламные технологии при продвижении научно-технических разработок',
                ],
            ],
        ];

        foreach ($facultiesAndSpecialities as $faculty => $specialities) {
            $faculty = Faculty::firstOrCreate(['name' => $faculty]);

            foreach ($specialities as $speciality) {
                $newSpeciality = Speciality::firstOrNew([
                    'code' => $speciality['code'],
                    'name' => $speciality['name'],
                    'profile' => $speciality['profile'],
                ]);
                $newSpeciality->faculty()->associate($faculty);
                $newSpeciality->save();
            }
        }
    }
}
