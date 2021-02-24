import LitTimeline from './LitTimeline';
import LitTimelineItem from './LitTimelineItem';

window.Lit.booting((Vue) => {
	Vue.component('lit-timeline', LitTimeline);
	Vue.component('lit-timeline-item', LitTimelineItem);
});
