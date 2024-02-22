<template>
  <main id="main-content" class="rvt-layout__wrapper sample-single">
    <LayoutWrapper class="acknowledgement">
      <Sidebar :nav-items="sidebar && sidebar" />
      <div class="rvt-layout__content rvt-c-top-padding rvt-p-bottom-none">
        <Breadcrumbs :pagePaths="pagePaths" />
        <div class="page">
          <h1
            class="rvt-m-top-sm rvt-m-bottom-xxs rvt-ts-md rvt-text-uppercase rvt-text-medium"
            ref="agreementRef"
          >
            Data Agreement
          </h1>

          <p v-if="result?.status === 'success'">
            Thank you for your interest in NCRAD.org's online biospecimen's
            catalogs. You have accepted the following agreement and provide the
            following information:
          </p>

          <p>
            <strong
              >I request access to data housed at the National Centralized
              Repository for Alzheimer's Disease and Related Dementias (NCRAD)
              for the purpose of scientific investigation, teaching, or the
              planning of clinical research studies and agree to the following
              terms:</strong
            >
          </p>

          <div class="agreement">
            <h2 id="section-i-access-use-and-safeguards">
              <a href="#section-i-access-use-and-safeguards"
                >Section I: Access, Use, and Safeguards</a
              >
            </h2>
            <p>
              <strong>A.</strong> I will receive de-identified data and will not
              attempt to establish the identity of, or attempt to contact any of
              the subjects with data in NCRAD.
            </p>
            <p>
              <strong>B.</strong> I will not attempt to identify any specific
              study sites, unless NCRAD has approved such identification as part
              of my project's protocol.
            </p>
            <p>
              <strong>C.</strong> I understand that distributing these data to a
              third party is prohibited, and therefore I will not distribute
              these data beyond the uses outlined in this agreement. A third
              party is defined as anyone who is not a collaborator or co-author
              on the analyses defined in my proposal.
            </p>
            <p>
              <strong>D.</strong> I will require anyone on my team who uses the
              data, or anyone with whom I share these data, to comply with this
              Data Agreement.
            </p>
            <p>
              <strong>E.</strong> I will accurately provide the requested
              information about persons who will use the data and analyses that
              are planned using these data.
            </p>
            <p>
              <strong>F.</strong> I will comply with any rules and regulations
              imposed by my institution and its institutional review board in
              requesting and using these data.
            </p>
            <p>
              <strong>G.</strong> I understand that any data I download may
              change as new quality assurance measures are implemented and data
              records are updated.
            </p>
            <p>
              <strong>H.</strong> I will ensure that Investigators who utilize
              data obtained from NCRAD use appropriate administrative, physical,
              and technical safeguards to prevent use or disclosure of the data
              other than as provided for by this Agreement.
            </p>
            <p>
              <strong>I.</strong> I will report any use or disclosure of the
              data not provided for by this Agreement of which I become aware
              within 15 days of becoming aware of such use or disclosure.
            </p>
            <h2 id="section-ii-data-analysis">
              <a href="#section-ii-data-analysis">Section II: Data Analysis</a>
            </h2>
            <p>
              <strong>A.</strong> I will respond promptly and accurately to
              NCRAD's requests for updates on the status of my analyses.
            </p>
            <p>
              <strong>B.</strong> I will review the data documentation provided
              by NCRAD and consult with NCRAD research coordinators in order to
              ensure the accurate use and description of study data in my
              analysis and any ensuing presentations or publications, as well as
              to ensure the understanding of subtle data complexities.
            </p>
            <p>
              <strong>C.</strong> If more than 1 year passes before publication,
              I will download an updated dataset to ensure the most accurate and
              up to date data is used.
            </p>
            <h2 id="section-iii-publication">
              <a href="#section-iii-publication">Section III: Publication</a>
            </h2>
            <p>
              <strong>A.</strong> I will include the NCRAD acknowledgement for
              all samples and data obtained:
            </p>
            <blockquote>
              <p>
                Samples and data from the National Centralized Repository for
                Alzheimer's Disease and Related Dementias (NCRAD), which
                receives government support under a cooperative agreement grant
                (U24 AG21886) awarded by the National Institute on Aging (NIA),
                were used in this study. We thank contributors who collected
                samples used in this study, as well as patients and their
                families, whose help and participation made this work possible.
              </p>
            </blockquote>
            <p>
              <strong>B.</strong> I will acknowledge the work by each specific
              study that went into accumulating the data and samples and its
              funding source(s), and will include language in the manuscripts
              associated with the correct collection. Every study has specific
              acknowledgement language. As new catalogs are added, additional
              language will continue to be listed.
            </p>
            <ol>
              <li>
                <strong>NIA-AD FBS</strong>:
                <blockquote>
                  <p>
                    The NIA-AD FBS study supported the collection of samples
                    used in this study through National Institute on Aging (NIA)
                    grants U24AG026395 and R01AG041797. We thank contributors,
                    including the Alzheimer's Disease Centers who collected
                    samples used in this study, as well as patients and their
                    families, whose help and participation made this work
                    possible.
                  </p>
                </blockquote>
              </li>
              <li>
                <strong>Indianapolis-Ibadan</strong>:
                <blockquote>
                  <p>
                    The Indianapolis-Ibadan dementia project is a 20 year
                    comparative community based epidemiological study of the
                    prevalence, incidence and risk factors for AD and dementia
                    in populations of African origin, elderly African Americans
                    in Indianapolis, Indiana and Yoruba in Ibadan, Nigeria. It
                    was supported from 1991-2012 by NIH grants RO1 AG09956 and
                    P30 AG 10133. We would like to take this opportunity to
                    thank the many faculty and staff of the University of Ibadan
                    and Indiana University School of Medicine for their
                    involvement as well as the 4000 plus elderly participants at
                    each of the sites.
                  </p>
                </blockquote>
              </li>
              <li>
                <strong>ARTFL</strong>:
                <blockquote>
                  <p>
                    The Advancing Research and Treatment for Frontotemporal
                    Lobar Degeneration (ARTFL) study receives support through a
                    U.S Department of Health and Human Services (DHHS) and the
                    National Institute of Neurological Disorders and Stroke
                    (NINDS)/National Center for Advancing Translational Sciences
                    (NCATS) grant U54NS092089. We thank the staff and
                    investigators of the study as well as the participants and
                    their families, whose help and participation made this work
                    possible.
                  </p>
                </blockquote>
              </li>
              <li>
                <strong>LEFFTDS</strong>:
                <blockquote>
                  <p>
                    The Longitudinal Evaluation of Familial Frontotemporal
                    Dementia Subjects (LEFFTDS) Study was made possible through
                    the support of the U.S Department of Health and Human
                    Services (DHHS) and the National Institute on Aging
                    (NIA)/National Institute of Neurological Disorders and
                    Stroke (NINDS) grant U01AG045390. We thank the staff and
                    investigators of the study as well as the participants and
                    their families, whose help and participation made this work
                    possible.
                  </p>
                </blockquote>
              </li>
              <li>
                <strong>4RTNI</strong>:
                <blockquote>
                  <p>
                    The Four Repeat Tauopathy Neuroimaging Initiative study was
                    made possible by National Institute on Aging grant
                    2R01AG038791. We thank the staff and investigators of the
                    study as well as the participants and their families, whose
                    help and participation made this work possible.
                  </p>
                </blockquote>
              </li>
              <li>
                <strong>ABC-DS</strong>:
                <blockquote>
                  <p>
                    The Alzheimer's Biomarkers Consortium - Down Syndrome
                    (ABC-DS) project is a longitudinal study of cognition and
                    blood based, genetic and imaging biomarkers of Alzheimer's
                    Disease. This study is funded by the National Institute on
                    Aging (NIA) grants U01AG051406 and U01AG051412 and the
                    National Institute for Child Health and Human Development
                    (NICHD). We thank the ABC-DS study participants and the
                    ABC-DS research and support staff for their contributions to
                    this study.
                  </p>
                </blockquote>
              </li>
              <li>
                <strong>90+</strong>:
                <blockquote>
                  <p>
                    The 90+ Study receives support through a National Institute
                    on Aging (NIA) grant R01AG21055. We thank the staff and
                    investigators of the study as well as the participants and
                    their families, whose help and participation made this work
                    possible.
                  </p>
                </blockquote>
              </li>
              <li>
                <strong>ADC</strong>:
                <blockquote>
                  <p>
                    Samples are contributed by the NIA-funded ADRCs: P30
                    AG019610 (PI Eric Reiman, MD), P30 AG013846 (PI Neil Kowall,
                    MD), P30 AG062428 (PI James Leverenz, MD) P30 AG066462 (PI
                    Scott Small, MD), P30 AG066511 (PI Allan Levey, MD, PhD),
                    P30 AG047266 (PI Todd Golde, MD, PhD), P30 AG010133 (PI
                    Andrew Saykin, PsyD), P30 AG066507 (PI Marilyn Albert, PhD),
                    P30 AG062421 (PI Bradley Hyman, MD, PhD), P30 AG062422 (PI
                    Ronald Petersen, MD, PhD), P30 AG066514 (PI Mary Sano, PhD),
                    P30 AG066512 (PI Thomas Wisniewski, MD), P30 AG013854 (PI
                    Robert Vassar, PhD), P30 AG066518 (PI Jeffrey Kaye, MD), P30
                    AG010161 (PI David Bennett, MD), P30 AG066515 (PI Victor
                    Henderson, MD, MS), P30 AG010129 (PI Charles DeCarli, MD),
                    P30 AG066519 (PI Frank LaFerla, PhD), P30 AG062429 (PI James
                    Brewer, MD, PhD), P30 AG062422 (PI Bruce Miller, MD), P30
                    AG035982 (PI Russell Swerdlow, MD), P30 AG028383 (PI Linda
                    Van Eldik, PhD), P30 AG053760 (PI Henry Paulson, MD, PhD),
                    P30 AG010124 (PI John Trojanowski, MD, PhD), P30 AG066468
                    (PI Oscar Lopez, MD), P50 AG005142 (PI Helena Chui, MD), P30
                    AG012300 (PI Roger Rosenberg, MD), P30 AG049638 (PI Suzanne
                    Craft, PhD), P30 AG066509 (PI Thomas Grabowski, MD), P30
                    AG062715 (PI Sanjay Asthana, MD, FRCP), P30 AG066444 (PI
                    John Morris, MD), P30 AG066508 (PI Stephen Strittmatter, MD,
                    PhD).
                  </p>
                </blockquote>
              </li>
              <li>
                <strong>ANGI</strong>:
                <blockquote>
                  <p>
                    The collection of the Amyloid Neuroimaging and Genetics
                    Initiative (ANGI) samples was supported by a grant from the
                    Alzheimer's Association (ANGI/IDEAS-17-497186). We thank the
                    Alzheimer's Association for their support and the ANGI study
                    participants for their contribution to the study. We would
                    also like to acknowledge the Imaging Dementia - Evidence for
                    Amyloid Scanning Study (iDEAS) from whom amyloid imaging and
                    other clinical data were obtained.
                  </p>
                </blockquote>
              </li>
              <li>
                <strong>iPSC INITIATIVE</strong>:
                <blockquote>
                  <p>
                    Samples and associated data are contributed by the National
                    Institute on Aging (NIA) grant:
                  </p>
                  <ul>
                    <li>P50 AG016573 (PI Mathew Blurton-Jones, PhD)</li>
                    <li>1 RF1 AG048083-01 (PI Lawrence Goldstein, PhD)</li>
                    <li>P50 AG047366 (PI Victor Henderson, MD, MS)</li>
                    <li>P50 AG005134 (PI Bradley Hyman, MD, PhD)</li>
                    <li>R56 AG057478 (PI Suman Jayadev, MD)</li>
                    <li>R01 AG062148 (PI Jessica Young, PhD)</li>
                  </ul>
                  <p>
                    We thank the staff and investigators of the study as well as
                    the participants and families, whose help and participation
                    is invaluable to this research effort.
                  </p>
                </blockquote>
              </li>
              <li>
                <strong>GEMS</strong>:
                <blockquote>
                  <p>
                    TThis publication was made possible by Grant Number U01
                    AT000162 from the National Center for Complementary and
                    Alternative Medicine, National Institutes of Health.
                  </p>
                </blockquote>
              </li>
            </ol>
            <p>
              <strong>C.</strong> I will notify NCRAD if my manuscript is
              accepted for publication and/or presentation.
            </p>
            <p>
              <strong>D.</strong> I will ensure the proper submission of all
              published work to PubMed Central (PMC) in order to comply with the
              NIH Public Access Policy.
            </p>
            <p>
              <strong
                >I understand that failure to abide by these guidelines will
                result in termination of my privileges to access NCRAD
                data.</strong
              >
            </p>

            <div
              class="rvt-checkbox rvt-m-top-md rvt-text-center"
              v-if="result?.status !== 'success'"
              ref="checkboxRef"
            >
              <input
                type="checkbox"
                name="checkbox-demo"
                id="agree"
                v-model="isChecked"
              />
              <label for="agree"
                ><strong>I AGREE</strong> to the terms outlined above</label
              >
            </div>

            <CatalogRequestForm
              v-if="isChecked"
              :catalog="catalog ? catalog : ''"
              @status-updated="handleResultUpdate"
              class="data-form rvt-p-bottom-xxl rvt-p-top-md"
            />

            <div
              class="rvt-flex rvt-items-center rvt-m-top-md action-btns"
              v-if="result?.status === 'success'"
            >
              <Button
                class="rvt-m-right-sm"
                href="/access-samples/available-samples"
                ><rvt-icon name="arrow-left" class="rvt-m-right-xs"></rvt-icon>
                Return to Available Samples</Button
              >
              <Button
                class="rvt-button rvt-button--secondary"
                @click="printConfirmation"
                ><rvt-icon name="printer" class="rvt-m-right-xs"></rvt-icon>
                Print this Page</Button
              >
            </div>
          </div>
        </div>
      </div>
    </LayoutWrapper>
  </main>
</template>

<script setup>
import { ref, watch, nextTick } from "vue";
import { sidebar } from "~/data/available-samples-sidebar.yml";
import { useRoute } from "vue-router";
import CatalogRequestForm from "~/components/forms/CatalogRequestForm.vue";

const isChecked = ref(false);
const agreementRef = ref(null);
const checkboxRef = ref(null);
const result = ref(null);

const route = useRoute();
const catalog = route.query.catalog;
// const catalogQuery = catalog ? `?catalog=${catalog}` : "";
const pagePaths = ["", "access-samples", "catalogs", "data-agreement"];

watch(isChecked, (val) => {
  if (val && checkboxRef.value) {
    checkboxRef.value.scrollIntoView({
      behavior: "smooth",
      block: "start",
      inline: "nearest",
    });
  }
});

watch(result, (newResult) => {
  if (newResult.status === "success" && agreementRef.value) {
    nextTick(() => {
      agreementRef.value.scrollIntoView({ behavior: "smooth", block: "start" });
    });
  }
});

const handleResultUpdate = (newResult) => {
  result.value = newResult;
};

const printConfirmation = () => {
  let printContents = document.querySelector(".page").innerHTML;
  let originalContents = document.body.innerHTML;
  document.body.innerHTML = printContents;
  window.print();
  document.body.innerHTML = originalContents;
};
</script>

<style lang="scss" scoped>
.action-btns {
  @media (max-width: 767px) {
    flex-direction: column;
    align-items: center;
    gap: 1rem;
  }
}
</style>
