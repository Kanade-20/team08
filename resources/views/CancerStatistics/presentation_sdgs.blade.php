@extends('app')

@section('title','可持續發展目標 (SDGs)')

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const links = document.querySelectorAll('a');
        links.forEach(link => {
        link.setAttribute('target', '_blank');
        });
    });
</script>
@section('sdgs_contents')

    <main>
        <section>
            <h2>什麼是SDGs?</h2>
            <p>可持續發展目標（SDGs）是聯合國於2015年制定的17個全球目標，旨在解決當前社會、經濟和環境面臨的挑戰。</p>
        </section>
        <section>
                <h2>17個議題中我要討論的是第三個議題，健康與福祉(Good Health and Well-being)</h2>
                <img src="https://storage.googleapis.com/futurecity-cms-cwg-tw/ckeditor/202101/ckeditor-6010d4bfbd6f6.jpg" height="268" width="400" style="border-radius: 15px" />
            <ul class="my_sdg3">
                <h1>SDG 3</h1>    
                <p>SDG 3主要的目標是，<mark>提高各個年齡層全體國民之醫療保健覆蓋率</mark>，並加強因應生命與健康危害，進行健康風險管理。
                其核心宗旨是<mark>確保所有人都能享有健康的生活並促進福祉</mark>。這一目標不僅涉及到提高醫療服務的可及性，還涵蓋了健康生活方式的推廣、疾病預防、醫療資源的平等分配等方面。
                SDG 3的實現將<mark>有助於減少全球疾病負擔，提升各國健康水平</mark>，尤其是在面對諸如癌症、心血管疾病、呼吸道疾病等重大健康挑戰時。</p>
                <p>根據世界衛生組織（WHO）的數據，健康不僅僅是沒有疾病，還包括身心的全面健康。SDG 3的具體目標包括：</p>
                <p class="issue_content"><mark>促進癌症等重大疾病的早期預防和診斷</mark>，改善醫療服務的可得性和質量。</p>
                <p class="issue_content">保障每個人都能接受必要的醫療護理，<mark>尤其是在低收入地區</mark>。</p>
                <p class="issue_content"><mark>加強健康促進與疾病防控</mark>，針對各類健康問題如心理健康、傳染病和非傳染病展開多層次的干預措施。</p>
                <p>達成SDG 3將不僅提升個人的健康水平，還能創造更加繁榮和可持續的社會。因此，推動健康和福祉已成為全球各國的共同責任。    
                    其中，癌症作為全球疾病負擔的主要來源之一，成為實現SDG 3的重要挑戰。
                    為了更好地應對這個挑戰，深入了解癌症的發生機制、預防策略以及治療資源的分佈是至關重要的。</p>
                <h1>癌症介紹</h1>
                <p >癌症又稱惡性瘤、惡性腫瘤是各種惡性腫瘤的統稱，相對於良性腫瘤，<mark>分為上皮癌和肉瘤兩大類</mark>。
                    癌症與良性腫瘤不同處在於：其<mark>細胞處於失控狀態</mark>，生長和分裂速率快，
                    具有浸潤、侵蝕和轉移的性質，並且分化不成熟、高度退行發育，自然過程呈致死性。
                    癌症的症狀多樣，<mark>除可引起局部壓迫和阻塞等症狀外，還可因浸潤和轉移而導致相應的臨床表現</mark>，
                    有時會<mark>出現貧血、發熱、體重下降、夜汗、感染、惡病質等全身表現</mark>。
                    生物體控制細胞分裂的機制失常後，細胞異常增生並侵犯身體的其他部分就會引發症狀。
                    除了分裂失控外，還會<mark>局部侵入週遭正常組織甚至經由體內循環系統或淋巴系統轉移到身體其他部分</mark>，
                    不是所有的腫瘤都會癌化，有些<mark>細胞異常增生但不會侵犯身體其他部分則稱為良性腫瘤</mark>，在人類身上，目前已知的癌症超過一百種。                
                </p>    
                <h1>癌症預防</h1>
                <p>依據世界衛生組織報告，菸、酒、不健康飲食、缺乏身體活動及肥胖等都是誘發癌症的主要危險因子，且<mark>至少有1/3的癌症是可以預防的</mark>。以下是幾個預防癌症的辦法。</p>
                <p class="issue_content text_color text_comtent" >拒菸、拒檳，避免過度飲酒</p>
                <p class="text_comtent">使用菸草不僅會對人體造成危害也會致癌，與酒精類飲品併用時，更是加劇對人體的危害程度。
                   研究顯示，<mark>肺癌患者中高達90%的比例有吸菸的習慣</mark>，是導致肺癌的最主要原因。
                   而<mark>檳榔子（菁仔）亦屬於第一類致癌物</mark>，嚼不含任何添加物的檳榔子也會致癌。
                   所有癌症的<mark>死亡人口中亦有3.6%的比例與飲酒有關</mark>。
                </p>
                <p class="issue_content text_color text_comtent">使用具實証可預防癌症之疫苗</p>
                <p class="text_comtent">世界衛生組織指出，每年約有超過50萬人死於原發性肝癌，而B、C型肝炎病毒為肝癌的首要危險因子。
                   據調查，8成以上的肝癌是由B型肝炎病毒所引起，<mark>施打B型肝炎疫苗則可有效避免感染B型肝炎而降低罹患肝癌風險</mark>。
                   感染人類乳突病毒（human papillomavirus, HPV）會誘發子宮頸、生殖器等部位的癌症外，也會導致頭部、頸部等部位發生鱗狀細胞癌。
                   <mark>施打HPV疫苗，可預防約6至7成的子宮頸癌症發生</mark>。因此國民健康署現有<mark>提供中低收入戶、低收入戶和山地原住民族地區及離島地區國中少女施打HPV疫苗</mark>。
                </p>
                <p class="issue_content text_color text_comtent">定期接受篩檢</p>
                <p class="text_comtent">國民健康署補助之乳癌、大腸癌、子宮頸癌和口腔癌篩檢，都是WHO建議可以經由篩檢，早期發現早期治療之癌症。
                   除了關心飲食和生活作息，也要<mark>記得定期接受癌症篩檢，千萬不要因為自覺身體健康就輕忽定期篩檢的重要性</mark>，
                   早期發現、早期治療才是面對癌症的積極態度。
                </p>
                <p>更多的預防辦法可以點選此網站<a href="https://www.tci-mandarin.com/ec99/rwd1277/category.asp?category_id=57">
                華人癌症資訊網</a></p>
                <h1>癌症數據與分析</h1>
                <p>為了更全面了解癌症的影響，我創建了一個資料庫，包含了從1979年到2021年各縣市的癌症相關數據，
                   涵蓋了粗率、病例數量、及年齡中位數等重要指標。這些數據有助於分析癌症在不同地區的分布，並且為進一步研究和政策制定提供支持。</p>
                <p>您可以透過以下資料表探索不同地區的癌症統計：</p>
                <p><a href="{{ url('CancerStatistics') }}" >點擊這裡查看資料庫</a></p>
                <p>通過分析這些數據，我們可以更好地了解癌症的流行趨勢，並提出改進公共衛生政策的建議。希望這些資料能幫助提升癌症的防控和治療效果。</p>

            </ul>
        </section>
        <h2 style="text-align: center">其他可持續發展目標</h2>
        <h2>(點選圖片可以了解更多)</h2>
        <div class="sdg-grid">
            <a href="https://globalgoals.tw/1-no-poverty">
                <img class="sdgs" src="https://storage.googleapis.com/futurecity-cms-cwg-tw/ckeditor/202101/ckeditor-6010d440e1ecf.jpg" />
            </a>
            <a href="https://globalgoals.tw/2-zero-hunger">
                <img class="sdgs" src="https://storage.googleapis.com/futurecity-cms-cwg-tw/ckeditor/202101/ckeditor-6010d482a7718.jpg" />
            </a>
            <a href="https://globalgoals.tw/4-quality-education">
                <img class="sdgs" src="https://storage.googleapis.com/futurecity-cms-cwg-tw/ckeditor/202101/ckeditor-6010d50654af8.jpg "/>
            </a>
            <a href="https://globalgoals.tw/5-gender-equality">
                <img class="sdgs" src="https://storage.googleapis.com/futurecity-cms-cwg-tw/ckeditor/202101/ckeditor-6010d550ad341.jpg" />
            </a>
            <a href="https://globalgoals.tw/6-clean-water-and-sanitation">
                <img class="sdgs" src="https://storage.googleapis.com/futurecity-cms-cwg-tw/ckeditor/202101/ckeditor-6010d5830066a.jpg">
            </a>
            <a href="https://globalgoals.tw/7-affordable-and-clean-energy">
                <img class="sdgs" src="https://storage.googleapis.com/futurecity-cms-cwg-tw/ckeditor/202101/ckeditor-6010d751c176f.jpg" />
            </a>
            <a href="https://globalgoals.tw/8-decent-work-and-economic-growth">
                <img class="sdgs" src="https://storage.googleapis.com/futurecity-cms-cwg-tw/ckeditor/202101/ckeditor-6010d78c8dd83.jpg" />
            </a>
            <a href="https://globalgoals.tw/9-industry-innovation-and-infrastructure">
                <img class="sdgs" src="https://storage.googleapis.com/futurecity-cms-cwg-tw/ckeditor/202101/ckeditor-6010d7ba19abe.jpg" />
            </a>
            <a href="https://globalgoals.tw/10-reduced-inequalities">
                <img class="sdgs" src="https://storage.googleapis.com/futurecity-cms-cwg-tw/ckeditor/202101/ckeditor-6010d7ee9825f.jpg" />
            </a>
            <a href="https://globalgoals.tw/11-sustainable-cities-and-communities">
                <img class="sdgs" src="https://storage.googleapis.com/futurecity-cms-cwg-tw/ckeditor/202101/ckeditor-6010d82775064.jpg" />
            </a>
            <a href="https://globalgoals.tw/12-responsible-consumption-and-production">
                <img class="sdgs" src="https://storage.googleapis.com/futurecity-cms-cwg-tw/ckeditor/202101/ckeditor-6010d853f2f50.jpg" />
            </a>
            <a href="https://globalgoals.tw/13-climate-action">
                <img class="sdgs" src="https://storage.googleapis.com/futurecity-cms-cwg-tw/ckeditor/202101/ckeditor-6010d89ee3c07.jpg" />
            </a>    
            <a href="https://globalgoals.tw/14-life-below-water">
                <img class="sdgs" src="https://storage.googleapis.com/futurecity-cms-cwg-tw/ckeditor/202101/ckeditor-6010d8c71bf04.jpg" />
            </a>
            <a href="https://globalgoals.tw/15-life-on-land">
                <img class="sdgs" src="https://storage.googleapis.com/futurecity-cms-cwg-tw/ckeditor/202101/ckeditor-6010d8fd7986e.jpg" />
            </a>
            <a href="https://globalgoals.tw/16-peace-justice-and-strong-institutions">
                <img class="sdgs" src="https://storage.googleapis.com/futurecity-cms-cwg-tw/ckeditor/202101/ckeditor-6010d93643593.jpg" />
            </a> 
            <a href="https://globalgoals.tw/17-partnerships-for-the-goals">
                <img class="sdgs" src="https://storage.googleapis.com/futurecity-cms-cwg-tw/ckeditor/202101/ckeditor-6010d96614ddb.jpg" />
            </a>
          </div>
    </main>
 
@endsection