const ee=document.querySelector("#add-phone"),te=document.querySelector("#remove-phone"),y=document.querySelector("#phone"),de=y.querySelectorAll(".my-phone").length;let S=de;ee.addEventListener("click",function(l){l.preventDefault(),S+=1;const t=document.createElement("div");t.classList.add("row","mb-3");const c=document.createElement("label");c.classList.add("col-sm-2","col-form-label"),c.textContent="Phone "+S;const i=document.createElement("div");i.classList.add("col-sm-2");const e=document.createElement("select");e.classList.add("form-select"),e.name="ph_select"+S;const s=document.createElement("option");s.text="Mobile",s.value="Mobile",e.add(s);const m=document.createElement("option");m.text="Landline",m.value="Landline",e.add(m);const r=document.createElement("option");r.text="Office",r.value="Office",e.add(r);const a=document.createElement("option");a.text="Fax",a.value="Fax",e.add(a);const o=document.createElement("option");o.text="Other",o.value="Other",e.add(o);const n=document.createElement("div");n.classList.add("col-sm-8");const d=document.createElement("input");d.type="text",d.setAttribute("required",""),d.setAttribute("pattern","[0-9+()]{5,}"),d.classList.add("form-control"),d.placeholder="Number",d.name="phone"+S,y.appendChild(t),t.appendChild(c),t.appendChild(i),i.appendChild(e),t.appendChild(n),n.appendChild(d);const p=document.createElement("div");p.classList.add("valid-feedback"),p.textContent="Looks Good";const C=document.createElement("div");C.classList.add("invalid-feedback"),C.textContent="Phone is reqired and must be a number",n.appendChild(p),n.appendChild(C)});te.addEventListener("click",function(l){if(l.preventDefault(),y.childElementCount>0)if(y.lastChild.classList=="row mb-3")y.removeChild(y.lastChild),S-=1;else{for(let t=0;t<2;t++)y.removeChild(y.lastChild);S-=1}});const ne=document.querySelector("#add-email"),oe=document.querySelector("#remove-email"),k=document.querySelector("#email"),ae=k.querySelectorAll(".my-email").length;let D=ae;ne.addEventListener("click",function(l){l.preventDefault(),D+=1;const t=document.createElement("div");t.classList.add("row","mb-3");const c=document.createElement("label");c.classList.add("col-sm-2","col-form-label"),c.textContent="Email "+D;const i=document.createElement("div");i.classList.add("col-sm-2");const e=document.createElement("select");e.classList.add("form-select"),e.name="em_select"+D;const s=document.createElement("option");s.text="Email",s.value="Email",e.add(s);const m=document.createElement("option");m.text="Work",m.value="Work",e.add(m);const r=document.createElement("option");r.text="Personal",r.value="Personal",e.add(r);const a=document.createElement("div");a.classList.add("col-sm-8");const o=document.createElement("input");o.type="text",o.setAttribute("required",""),o.classList.add("form-control","text-lowercase"),o.placeholder="Address",o.name="email"+D,k.appendChild(t),t.appendChild(c),t.appendChild(i),i.appendChild(e),t.appendChild(a),a.appendChild(o);const n=document.createElement("div");n.classList.add("valid-feedback"),n.textContent="Looks Good";const d=document.createElement("div");d.classList.add("invalid-feedback"),d.textContent="Email is required and must be valid email",a.appendChild(n),a.appendChild(d)});oe.addEventListener("click",function(l){if(l.preventDefault(),k.childElementCount>0)if(k.lastChild.classList=="row mb-3")k.removeChild(k.lastChild),D-=1;else{for(let t=0;t<2;t++)k.removeChild(k.lastChild);D-=1}});const le=document.querySelector("#add-site"),ce=document.querySelector("#remove-site"),q=document.querySelector("#site"),ie=q.querySelectorAll(".my-site").length;let A=ie;le.addEventListener("click",function(l){l.preventDefault(),A+=1;const t=document.createElement("div");t.classList.add("row","mb-3");const c=document.createElement("label");c.classList.add("col-sm-2","col-form-label"),c.textContent="Website "+A;const i=document.createElement("div");i.classList.add("col-sm-2");const e=document.createElement("select");e.classList.add("form-select"),e.name="site_select"+A;const s=document.createElement("option");s.text="Website",s.value="Website",e.add(s);const m=document.createElement("option");m.text="Facebook",m.value="Facebook",e.add(m);const r=document.createElement("option");r.text="Instagram",r.value="Instagram",e.add(r);const a=document.createElement("option");a.text="Linkedin",a.value="Linkedin",e.add(a);const o=document.createElement("option");o.text="Location",o.value="Location",e.add(o);const n=document.createElement("option");n.text="Twitter",n.value="Twitter",e.add(n);const d=document.createElement("option");d.text="Snapchat",d.value="Snapchat",e.add(d);const p=document.createElement("option");p.text="TikTok",p.value="TikTok",e.add(p);const C=document.createElement("option");C.text="Google Maps",C.value="GoogleMaps",e.add(C);const L=document.createElement("option");L.text="What'sApp",L.value="WhatsApp",e.add(L);const b=document.createElement("option");b.text="Other",b.value="Other",e.add(b);const h=document.createElement("div");h.classList.add("col-sm-8");const E=document.createElement("input");E.type="text",E.type="text",E.setAttribute("required",""),E.classList.add("form-control"),E.placeholder="Link URL",E.name="website"+A,q.appendChild(t),t.appendChild(c),t.appendChild(i),i.appendChild(e),t.appendChild(h),h.appendChild(E);const f=document.createElement("div");f.classList.add("valid-feedback"),f.textContent="Looks Good";const x=document.createElement("div");x.classList.add("invalid-feedback"),x.textContent="Website is reqired",h.appendChild(f),h.appendChild(x)});ce.addEventListener("click",function(l){if(l.preventDefault(),q.childElementCount>0)if(q.lastChild.classList=="row mb-3")q.removeChild(q.lastChild),A-=1;else{for(let t=0;t<2;t++)q.removeChild(q.lastChild);A-=1}});const se=document.querySelector("#add-address"),me=document.querySelector("#remove-address"),v=document.querySelector("#address"),re=v.querySelectorAll(".my-address").length;let u=re;se.addEventListener("click",function(l){l.preventDefault(),u+=1;const t=document.createElement("div");t.classList.add("row","mb-3");const c=document.createElement("label");c.classList.add("col-sm-2","col-form-label"),c.textContent="Address "+u;const i=document.createElement("div");i.classList.add("col-sm-2");const e=document.createElement("select");e.classList.add("form-select"),e.name="ad_select"+u;const s=document.createElement("option");s.text="Address",s.value="Address",e.add(s);const m=document.createElement("option");m.text="Home",m.value="Home",e.add(m);const r=document.createElement("option");r.text="Work",r.value="Work",e.add(r);const a=document.createElement("option");a.text="Mailing",a.value="Mailing",e.add(a);const o=document.createElement("option");o.text="Other",o.value="Other",e.add(o);const n=document.createElement("div");n.classList.add("col-sm-8");const d=document.createElement("input");d.type="text",d.setAttribute("required",""),d.classList.add("form-control"),d.placeholder="Name",d.name="address"+u;const p=document.createElement("div");p.classList.add("row","mb-3");const C=document.createElement("label");C.classList.add("col-sm-2","col-form-label");const L=document.createElement("div");L.classList.add("col-sm-10");const b=document.createElement("input");b.type="text",b.classList.add("form-control"),b.placeholder="Street Address",b.name="ad-street"+u;const h=document.createElement("div");h.classList.add("row","mb-3");const E=document.createElement("label");E.classList.add("col-sm-2","col-form-label");const f=document.createElement("div");f.classList.add("col-sm-10");const x=document.createElement("input");x.type="text",x.classList.add("form-control"),x.placeholder="Apt Suite,Bldg",x.name="ad-apt"+u;const g=document.createElement("div");g.classList.add("row","mb-3");const Y=document.createElement("label");Y.classList.add("col-sm-2","col-form-label");const I=document.createElement("div");I.classList.add("col-sm-5");const w=document.createElement("input");w.type="text",w.classList.add("form-control"),w.placeholder="City",w.name="ad-city"+u;const G=document.createElement("div");G.classList.add("col-sm-5");const V=document.createElement("input");V.type="text",V.classList.add("form-control"),V.placeholder="Region",V.name="ad-region"+u;const W=document.createElement("div");W.classList.add("row","mb-3");const $=document.createElement("label");$.classList.add("col-sm-2","col-form-label");const O=document.createElement("div");O.classList.add("col-sm-5");const P=document.createElement("input");P.type="text",P.classList.add("form-control"),P.placeholder="Country",P.name="ad-country"+u;const M=document.createElement("div");M.classList.add("col-sm-5");const T=document.createElement("input");T.type="text",T.classList.add("form-control"),T.placeholder="Zip / Postal Code",T.name="ad-postal"+u,v.appendChild(t),t.appendChild(c),t.appendChild(i),i.appendChild(e),t.appendChild(n),n.appendChild(d);const N=document.createElement("div");N.classList.add("valid-feedback"),N.textContent="Looks Good";const R=document.createElement("div");R.classList.add("invalid-feedback"),R.textContent="Address Name is reqired",n.appendChild(N),n.appendChild(R),v.appendChild(p),p.appendChild(C),p.appendChild(L),L.appendChild(b);const F=document.createElement("div");F.classList.add("valid-feedback"),F.textContent="Looks Good";const _=document.createElement("div");_.classList.add("invalid-feedback"),_.textContent="Street is reqired",L.appendChild(F),L.appendChild(_),v.appendChild(h),h.appendChild(E),h.appendChild(f),f.appendChild(x);const B=document.createElement("div");B.classList.add("valid-feedback"),B.textContent="Looks Good";const H=document.createElement("div");H.classList.add("invalid-feedback"),H.textContent="Apt Suite , Bldg is reqired",f.appendChild(B),f.appendChild(H),v.appendChild(g),g.appendChild(Y),g.appendChild(I),g.appendChild(G),I.appendChild(w),G.appendChild(V);const Z=document.createElement("div");Z.classList.add("valid-feedback"),Z.textContent="Looks Good";const U=document.createElement("div");U.classList.add("invalid-feedback"),U.textContent="City is reqired";const j=document.createElement("div");j.classList.add("valid-feedback"),j.textContent="Looks Good";const z=document.createElement("div");z.classList.add("invalid-feedback"),z.textContent="Region is reqired",G.appendChild(j),G.appendChild(z),I.appendChild(Z),I.appendChild(U),v.appendChild(W),W.appendChild($),W.appendChild(O),W.appendChild(M),O.appendChild(P),M.appendChild(T);const J=document.createElement("div");J.classList.add("valid-feedback"),J.textContent="Looks Good";const K=document.createElement("div");K.classList.add("invalid-feedback"),K.textContent="Country is reqired",O.appendChild(J),O.appendChild(K);const Q=document.createElement("div");Q.classList.add("valid-feedback"),Q.textContent="Looks Good";const X=document.createElement("div");X.classList.add("invalid-feedback"),X.textContent="Zip / Postal Code is reqired",M.appendChild(Q),M.appendChild(X)});me.addEventListener("click",function(l){if(l.preventDefault(),v.childElementCount>0)if(v.lastChild.classList=="row mb-3"){for(let t=0;t<5;t++)v.removeChild(v.lastChild);u-=1}else{for(let t=0;t<10;t++)v.removeChild(v.lastChild);u-=1}});
