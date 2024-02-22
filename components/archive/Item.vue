<template>
  <div class="pub-div archive-item">
    <div class="pages">
      <div class="page-cover cover">
        <NuxtImg src="/assets/NCRAD_Update/NCRAD_Update_30.png" format="webp" />
      </div>
      <div class="page-content content">
        <h4>What's Inside</h4>
        <ul>
          <li>
            NCRAD establishes a new laboratory to support Alzheimer’s disease
            research innovations
          </li>
          <li>NCRAD Attends AAIC 2022</li>
          <li>
            Study Spotlight - Alzheimer’s Gut Microbiome Project Duke University
          </li>
        </ul>
        <div class="btn-container">
          <Button
            variant="primary-btn"
            class="rvt-ts-xxs"
            href="/assets/docs/NCRAD_Update/NCRAD_Update_30.pdf"
            target="_blank"
            label="Download"
          />
          <Button
            variant="primary"
            class="rvt-ts-xxs rvt-m-left-xs"
            href="/assets/docs/NCRAD_Update/NCRAD_Update_30.pdf"
            target="_blank"
            label="View"
          />
        </div>
      </div>
    </div>
    <div class="info">
      <h4 class="volume">Volume 30</h4>
      <h5 class="pub-date">Fall 2022</h5>
    </div>
  </div>
</template>

<script setup></script>

<style lang="scss" scoped>
.pub-div {
  width: 100%;
  min-height: 300px;
  margin-bottom: 30px;
}
.pub-div .pages {
  transform: rotateY(0);
  perspective: 1200px;
  perspective-origin: left center;
  top: 0;
  left: 0;
  width: 100%;
  max-width: 250px;
  height: 300px;
}
.pub-div .pages:hover .page-cover {
  transform: rotateY(-90deg);
}
// .pub-div .pages:hover .page-cover:after {
//   transition: 0.5s;
//   transition-timing-function: ease-out;
//   -webkit-box-shadow: 5px 5px 20px #DDD;
//   -moz-box-shadow: 5px 5px 20px #DDD;
//   box-shadow: 5px 5px 20px #DDD;
//   -webkit-transform: skew(0deg, 0deg);
//   -moz-transform: skew(0deg, 0deg);
//   -o-transform: skew(0deg, 0deg);
//   -ms-transform: skew(0deg, 0deg);
//   transform: skew(-3deg, -3deg);
// }
.pub-div .pages .page-cover {
  position: absolute;
  backface-visibility: hidden;
  z-index: 2;
  top: 0;
  left: 0;
  min-height: 300px;
  transform-origin: left center;
  transition: 0.5s;
  transition-timing-function: ease-out;
  transform-style: preserve-3d;
  background-color: white;
  border: solid 0.5px #ddd;
  width: 100%;
}
.pub-div .pages .page-cover img {
  background-color: white;
  width: 100%;
  max-height: 300px;
}

.pub-div .pages .page-content {
  position: absolute;
  z-index: 1;
  top: 0;
  left: 0;
  min-height: 300px;
  width: 100%;
  padding: 20px;
  border: solid 0.5px #ddd;
}
.pub-div .pages .page-content h4 {
  font-weight: bold;
  color: #9c6cae;
  margin-top: 0 !important;
  border-bottom: solid 1px #9c6cae;
}
.pub-div .pages .page-content ul {
  padding-left: 10px;
  font-size: 0.75em;
}
.pub-div .pages .page-content ul li {
  margin-bottom: 3px;
}
.pub-div .pages .page-content .btn-container {
  position: absolute;
  bottom: 5px;
  left: 0;
  width: 100%;
  padding: 10px;
}
.pub-div .pages .page-content .dl-button,
.pub-div .pages .page-content .view-button {
  float: right;
  margin-left: 5px;
}
.pub-div .volume {
  text-align: center;
}
.pub-div .pub-date {
  text-align: center;
  line-height: 0;
}
</style>
