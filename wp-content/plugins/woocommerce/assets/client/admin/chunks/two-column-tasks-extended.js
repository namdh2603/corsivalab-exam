"use strict";(globalThis.webpackChunk_wcAdmin_webpackJsonp=globalThis.webpackChunk_wcAdmin_webpackJsonp||[]).push([[1920],{12658:(e,s,t)=>{t.r(s),t.d(s,{default:()=>k});var i=t(69307),o=t(65736),l=t(55609),n=t(86158),a=t(9818),c=t(67221),r=t(14599),m=t(42442),d=t(18384),_=t(13184);const k=e=>{let{query:s}=e;const{hideTaskList:t}=(0,a.useDispatch)(c.ONBOARDING_STORE_NAME),{updateOptions:k}=(0,a.useDispatch)(c.OPTIONS_STORE_NAME),{task:u}=s,{isResolving:p,taskLists:h}=(0,a.useSelect)((e=>({isResolving:e(c.ONBOARDING_STORE_NAME).isResolving("getTaskListsByIds"),taskLists:e(c.ONBOARDING_STORE_NAME).getTaskListsByIds(["extended_two_column"])})));if((0,i.useEffect)((()=>{k({woocommerce_task_list_prompt_shown:!0})}),[h,p]),u)return null;if(p)return(0,i.createElement)(_.S,{query:s});const g=h[0];if(!g||0===g.tasks.length)return null;const E=g.tasks.filter((e=>e.isComplete)).length===g.tasks.length,{id:w,eventPrefix:N,isHidden:O,isVisible:T,isToggleable:y,title:b,tasks:R,displayProgressHeader:f,keepCompletedTaskList:A}=g;return T?(0,i.createElement)(i.Fragment,{key:w},(0,i.createElement)(d.a,{query:s,id:w,eventPrefix:N,isComplete:E,tasks:R,title:b,isHidden:O,isVisible:T,displayProgressHeader:f,keepCompletedTaskList:A}),y&&(0,i.createElement)(m.z,null,(0,i.createElement)(l.MenuGroup,{className:"woocommerce-layout__homescreen-display-options",label:(0,o.__)("Display","woocommerce")},(0,i.createElement)(l.MenuItem,{className:"woocommerce-layout__homescreen-extension-tasklist-toggle",icon:O?void 0:n.Z,isSelected:!O,role:"menuitemcheckbox",onClick:()=>(e=>{const{id:s,isHidden:i}=e,o=!i;(0,r.recordEvent)(o?`${s}_tasklist_hide`:`${s}_tasklist_show`,{}),t(s)})(g)},(0,o.__)("Show things to do next","woocommerce"))))):null}}}]);