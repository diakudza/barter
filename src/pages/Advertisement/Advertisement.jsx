import React from 'react';
import classes from './Advertisement.module.css';
import DB from '../../DATABASE/Vips.json';
import {Link} from "react-router-dom";
import ads from '../../DATABASE/Recommendations.json';
import AdsRecommendations from "../../components/AdsRecommendations/AdsRecommendations";

const Advertisement = () => {
    let id = Number(window.location.pathname.replace('/advertisement/',''));
    let item = [];
    for(let i=0;i<DB.length;i++){;
        if(DB[i].ad_id === id){
            item.push(DB[i]);
        }
    }
    item = item[0];
    /* TODO: Нужно получить данные из базы с выборкой по 4шт */
    return (
        <div className={classes.container}>
            <div className={classes.card}>
                <div className={classes.navigation}>
                    <Link to='/' className={classes.navigation_back}>
                        <svg width="12" height="10" viewBox="0 0 12 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0.833008 5.18287L10.833 5.18287" stroke="#23262F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M4.86621 9.19914L0.832877 5.18314L4.86621 1.16647" stroke="#23262F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        Вернуться к объявлениям
                    </Link>
                    <div className={classes.navigation_crumbs}>
                        <Link to='/' className={classes.navigation_crumb}>Главная</Link>
                        <Link to='/' className={classes.navigation_crumb}>Объявления</Link>
                        <Link to='/' className={classes.navigation_crumb}>Недвижимость</Link>
                        <Link to='/' className={[classes.navigation_crumb, classes.navigation_crumb_active].join(' ')}>8723 New York st. Alihey 187921</Link>
                    </div>
                </div>
                <h3 className={classes.heading}>
                    Прекрасный дом с отличным видом
                </h3>
                <div className={classes.subNavigation}>
                    <p className={classes.subNavigation_region}>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M14.5 10.5005C14.5 9.11924 13.3808 8 12.0005 8C10.6192 8 9.5 9.11924 9.5 10.5005C9.5 11.8808 10.6192 13 12.0005 13C13.3808 13 14.5 11.8808 14.5 10.5005Z" stroke="#23262F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9995 21C10.801 21 4.5 15.8984 4.5 10.5633C4.5 6.38664 7.8571 3 11.9995 3C16.1419 3 19.5 6.38664 19.5 10.5633C19.5 15.8984 13.198 21 11.9995 21Z" stroke="#23262F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        8723 New York st. Alihey 187921
                    </p>
                    <button className={classes.subNavigation_favorite}>
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M13.159 4.10235C13.159 2.26844 11.9052 1.53326 10.1001 1.53326H5.86079C4.11108 1.53326 2.7998 2.21831 2.7998 3.98005V13.7959C2.7998 14.2798 3.32044 14.5846 3.74216 14.348L7.9968 11.9613L12.2147 14.344C12.6371 14.5819 13.159 14.2771 13.159 13.7926V4.10235Z" stroke="#23262F" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M5.51367 6.01862H10.3925" stroke="#23262F" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        Добавить в избранное
                    </button>
                </div>
                <div className={classes.inner}>
                    <div className={classes.advertisement}>
                        <div className={classes.advertisement_gallery}>
                            <div className={classes.advertisement_bigPic}><img src={'/images/advertisement/recommendations/'+item.ad_image} alt={item.ad_title}/></div>
                            <div className={classes.advertisement_pictures}>
                                <div className={classes.advertisement_smallPic}><img src={'/images/advertisement/recommendations/'+item.ad_image} alt={item.ad_title}/></div>
                                <div className={classes.advertisement_smallPic}><img src={'/images/advertisement/recommendations/'+item.ad_image} alt={item.ad_title}/></div>
                                <div className={classes.advertisement_smallPic}><img src={'/images/advertisement/recommendations/'+item.ad_image} alt={item.ad_title}/></div>
                                <div className={classes.advertisement_smallPic}><img src={'/images/advertisement/recommendations/'+item.ad_image} alt={item.ad_title}/></div>
                                <div className={[classes.advertisement_smallPic]}>
                                    <img src={'/images/advertisement/recommendations/'+item.ad_image} alt={item.ad_title} className={classes.advertisement_blured}/>
                                    <div className={classes.advertisement_blured_block}>
                                        <p className={classes.advertisement_blured_text}>
                                            +15
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div className={classes.advertisement_badges}>
                            <div className={classes.advertisement_badge}>
                                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15.9325 19.3866C11.3325 19.3866 7.45117 20.1383 7.45117 23.0393C7.45117 25.9415 11.3575 26.6667 15.9325 26.6667C20.5325 26.6667 24.4138 25.9151 24.4138 23.0141C24.4138 20.1118 20.5074 19.3866 15.9325 19.3866Z" fill="#315DF7"/>
                                    <path opacity="0.4" d="M15.9317 16.6228C19.0466 16.6228 21.5442 14.1108 21.5442 10.9781C21.5442 7.84413 19.0466 5.33337 15.9317 5.33337C12.8169 5.33337 10.3193 7.84413 10.3193 10.9781C10.3193 14.1108 12.8169 16.6228 15.9317 16.6228Z" fill="#315DF7"/>
                                    <path opacity="0.4" d="M28.1171 12.2923C28.923 9.12236 26.5603 6.27539 23.5517 6.27539C23.2246 6.27539 22.9118 6.31141 22.6062 6.37265C22.5656 6.38226 22.5202 6.40267 22.4964 6.43869C22.4689 6.48432 22.4892 6.54556 22.519 6.58518C23.4228 7.86038 23.9421 9.41294 23.9421 11.0796C23.9421 12.6766 23.4658 14.1655 22.6301 15.4011C22.5441 15.5283 22.6205 15.7 22.7721 15.7265C22.9823 15.7637 23.1972 15.7829 23.4168 15.7889C25.6076 15.8465 27.5739 14.4285 28.1171 12.2923Z" fill="#315DF7"/>
                                    <path d="M30.4135 19.756C30.0124 18.8963 29.0442 18.3067 27.5721 18.0173C26.8773 17.8468 24.9969 17.6067 23.2479 17.6391C23.2216 17.6427 23.2073 17.6607 23.2049 17.6727C23.2013 17.6895 23.2085 17.7183 23.2431 17.7363C24.0514 18.1386 27.1758 19.8881 26.783 23.578C26.7663 23.7377 26.894 23.8758 27.0528 23.8517C27.8216 23.7413 29.7999 23.3138 30.4135 21.9822C30.7526 21.2785 30.7526 20.4608 30.4135 19.756Z" fill="#315DF7"/>
                                    <path opacity="0.4" d="M9.39411 6.37302C9.08967 6.31058 8.77568 6.27576 8.44856 6.27576C5.43999 6.27576 3.07732 9.12273 3.88437 12.2927C4.42639 14.4288 6.39271 15.8469 8.58347 15.7893C8.80314 15.7833 9.01923 15.7629 9.22816 15.7268C9.37978 15.7004 9.45619 15.5287 9.37023 15.4014C8.53452 14.1647 8.05816 12.6769 8.05816 11.0799C8.05816 9.41211 8.57869 7.85954 9.48246 6.58555C9.51111 6.54592 9.5326 6.48469 9.50395 6.43906C9.48007 6.40184 9.43589 6.38262 9.39411 6.37302Z" fill="#315DF7"/>
                                    <path d="M4.4294 18.0171C2.95736 18.3064 1.99032 18.896 1.58918 19.7557C1.24892 20.4606 1.24892 21.2783 1.58918 21.9831C2.20283 23.3135 4.18108 23.7422 4.94993 23.8515C5.10872 23.8755 5.23527 23.7386 5.21856 23.5777C4.82577 19.889 7.95014 18.1395 8.75959 17.7373C8.79302 17.7181 8.80018 17.6905 8.7966 17.6724C8.79421 17.6604 8.78108 17.6424 8.75481 17.64C7.00459 17.6064 5.12543 17.8466 4.4294 18.0171Z" fill="#315DF7"/>
                                </svg>
                                <div className={classes.advertisement_badge_info}>
                                    <p className={classes.advertisement_badge_up}>Проживает</p>
                                    <p className={classes.advertisement_badge_down}>3 человека</p>
                                </div>
                            </div>
                            <div className={classes.advertisement_badge}>
                                <svg width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.4" d="M21.7675 2.66663H26.2821C28.1518 2.66663 29.6669 4.19443 29.6669 6.07992V10.6327C29.6669 12.5182 28.1518 14.046 26.2821 14.046H21.7675C19.8978 14.046 18.3828 12.5182 18.3828 10.6327V6.07992C18.3828 4.19443 19.8978 2.66663 21.7675 2.66663Z" fill="#58BD7D"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M6.38471 2.66663H10.8993C12.769 2.66663 14.284 4.19443 14.284 6.07992V10.6327C14.284 12.5182 12.769 14.046 10.8993 14.046H6.38471C4.51501 14.046 3 12.5182 3 10.6327V6.07992C3 4.19443 4.51501 2.66663 6.38471 2.66663ZM6.38471 17.954H10.8993C12.769 17.954 14.284 19.4818 14.284 21.3673V25.92C14.284 27.8043 12.769 29.3333 10.8993 29.3333H6.38471C4.51501 29.3333 3 27.8043 3 25.92V21.3673C3 19.4818 4.51501 17.954 6.38471 17.954ZM26.282 17.954H21.7674C19.8977 17.954 18.3827 19.4818 18.3827 21.3673V25.92C18.3827 27.8043 19.8977 29.3333 21.7674 29.3333H26.282C28.1517 29.3333 29.6667 27.8043 29.6667 25.92V21.3673C29.6667 19.4818 28.1517 17.954 26.282 17.954Z" fill="#58BD7D"/>
                                </svg>
                                <div className={classes.advertisement_badge_info}>
                                    <p className={classes.advertisement_badge_up}>Кол-во комнат</p>
                                    <p className={classes.advertisement_badge_down}>4 комнаты</p>
                                </div>
                            </div>
                            <div className={classes.advertisement_badge}>
                                <svg width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12.0428 3.91566C14.956 2.22299 18.5367 2.25258 21.4225 3.99315C24.28 5.76918 26.0166 8.93887 26.0005 12.3486C25.934 15.7359 24.0717 18.92 21.744 21.3814C20.4005 22.8085 18.8975 24.0704 17.2658 25.1414C17.0977 25.2386 16.9137 25.3036 16.7226 25.3333C16.5388 25.3255 16.3598 25.2712 16.2017 25.1753C13.7106 23.5661 11.5251 21.512 9.75043 19.1119C8.26544 17.1085 7.42177 14.688 7.33399 12.1792C7.33206 8.76296 9.12968 5.60832 12.0428 3.91566ZM13.7262 13.593C14.2162 14.8011 15.3729 15.5891 16.6561 15.5891C17.4968 15.5951 18.3049 15.2584 18.9004 14.6539C19.4959 14.0495 19.8293 13.2275 19.8263 12.3712C19.8308 11.064 19.0613 9.88306 17.877 9.37967C16.6928 8.87628 15.3274 9.14977 14.4184 10.0724C13.5095 10.9951 13.2362 12.3849 13.7262 13.593Z" fill="#9757D7"/>
                                    <ellipse opacity="0.4" cx="16.6677" cy="28" rx="6.66668" ry="1.33334" fill="#9757D7"/>
                                </svg>
                                <div className={classes.advertisement_badge_info}>
                                    <p className={classes.advertisement_badge_up}>Время до метро</p>
                                    <p className={classes.advertisement_badge_down}>~15 минут</p>
                                </div>
                            </div>
                        </div>
                        <h2 className={classes.advertisement_heading}>Описание</h2>
                        <p className={classes.advertisement_info}>
                            Described by Queenstown House & Garden magazine as having 'one of the best views we've ever seen' you will love relaxing in this newly built, architectural house sitting proudly on Queenstown Hill. Enjoy breathtaking 180' views of Lake Wakatipu from your well appointed & privately accessed bedroom with modern en suite and floor-to-ceiling windows.

                            Described by Queenstown House & Garden magazine as having 'one of the best views we've ever seen' you will love relaxing in this newly built, architectural house sitting proudly on Queenstown Hill.

                            Enjoy breathtaking 180' views of Lake Wakatipu from your well appointed & privately accessed bedroom with modern
                            en suite and floor-to-ceiling windows and other cool stuff that you’ll like we guess.
                        </p>
                        <p className={classes.advertisement_region}>
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M14.5 10.5005C14.5 9.11924 13.3808 8 12.0005 8C10.6192 8 9.5 9.11924 9.5 10.5005C9.5 11.8808 10.6192 13 12.0005 13C13.3808 13 14.5 11.8808 14.5 10.5005Z" stroke="#23262F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9995 21C10.801 21 4.5 15.8984 4.5 10.5633C4.5 6.38664 7.8571 3 11.9995 3C16.1419 3 19.5 6.38664 19.5 10.5633C19.5 15.8984 13.198 21 11.9995 21Z" stroke="#23262F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            8723 New York st. Alihey 187921
                        </p>
                    </div>
                    <div className={classes.profile} id={item.profile_id}>
                        <div className={classes.profile_inner}>
                            <div className={classes.profile_badges}>
                                <div className={classes.profile_badge}>
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.4" d="M10.8139 2.5946L12.6693 6.32315C12.806 6.59329 13.0669 6.78089 13.3678 6.82258L17.5353 7.42955C17.7787 7.46373 17.9996 7.59213 18.1488 7.78806C18.2963 7.9815 18.3597 8.22662 18.3238 8.46758C18.2947 8.66768 18.2005 8.85277 18.0563 8.99451L15.0365 11.9218C14.8156 12.1261 14.7156 12.4288 14.7689 12.7247L15.5124 16.8402C15.5916 17.3371 15.2624 17.8056 14.7689 17.8999C14.5655 17.9324 14.3572 17.8982 14.1738 17.8048L10.4563 15.868C10.1804 15.7288 9.85453 15.7288 9.57864 15.868L5.86118 17.8048C5.40441 18.0474 4.83846 17.8824 4.58424 17.4321C4.49005 17.2529 4.45671 17.0486 4.48755 16.8493L5.23104 12.7331C5.28439 12.4379 5.18353 12.1336 4.96348 11.9293L1.94367 9.00368C1.58443 8.65684 1.57359 8.08572 1.9195 7.72637C1.927 7.71886 1.93534 7.71053 1.94367 7.70219C2.08704 7.55628 2.27541 7.46373 2.47879 7.43955L6.64634 6.83175C6.94641 6.78922 7.2073 6.6033 7.34483 6.33149L9.13354 2.5946C9.29274 2.27443 9.62281 2.07517 9.98122 2.0835H10.0929C10.4038 2.12102 10.6747 2.31362 10.8139 2.5946Z" fill="#9757D7"/>
                                        <path d="M9.99366 15.7642C9.83224 15.7692 9.67498 15.8125 9.53354 15.8901L5.83425 17.8225C5.38162 18.0385 4.83996 17.8709 4.58618 17.438C4.49216 17.2612 4.45805 17.0586 4.48967 16.8601L5.22852 12.7525C5.27845 12.454 5.1786 12.1504 4.96144 11.9402L1.94027 9.01531C1.58166 8.66419 1.575 8.08788 1.92613 7.72842C1.93112 7.72342 1.93528 7.71925 1.94027 7.71508C2.08339 7.57329 2.2681 7.47988 2.46696 7.45069L6.63801 6.83686C6.94005 6.79849 7.20214 6.61001 7.33527 6.33645L9.1483 2.55252C9.32053 2.24727 9.65086 2.06545 10.0003 2.08463C9.99366 2.33234 9.99366 15.5957 9.99366 15.7642Z" fill="#9757D7"/>
                                    </svg>
                                    VIP
                                </div>
                            </div>
                            <div className={classes.profile_info}>
                                <div className={classes.profile_info_inner}>
                                    <div className={classes.profile_info_header}>
                                        <div className={classes.profile_info_image}><img src={'/images/advertisement/vip/'+item.profile_image} alt=""/></div>
                                        <div className={classes.profile_info_block}>
                                            <div className={classes.profile_info_name}>{item.profile_name}</div>
                                            <div className={classes.profile_info_rating}>
                                                <p className={classes.profile_info_rank}>
                                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M10.452 8.35331C10.3009 8.49973 10.2315 8.71148 10.2659 8.91915L10.7845 11.7891C10.8283 12.0324 10.7256 12.2786 10.522 12.4191C10.3225 12.565 10.0571 12.5825 9.83953 12.4658L7.25594 11.1183C7.16611 11.0705 7.06636 11.0448 6.96428 11.0419H6.80619C6.75136 11.0501 6.69769 11.0676 6.64869 11.0944L4.06453 12.4483C3.93678 12.5125 3.79211 12.5352 3.65036 12.5125C3.30503 12.4471 3.07461 12.1181 3.13119 11.7711L3.65036 8.90106C3.68478 8.69165 3.61536 8.47873 3.46428 8.32998L1.35786 6.28831C1.18169 6.1174 1.12044 5.86073 1.20094 5.62915C1.27911 5.39815 1.47861 5.22956 1.71953 5.19165L4.61869 4.77106C4.83919 4.74831 5.03286 4.61415 5.13203 4.41581L6.40953 1.79665C6.43986 1.73831 6.47894 1.68465 6.52619 1.63915L6.57869 1.59831C6.60611 1.56798 6.63761 1.5429 6.67261 1.52248L6.73619 1.49915L6.83536 1.45831H7.08094C7.30028 1.48106 7.49336 1.61231 7.59428 1.80831L8.88869 4.41581C8.98203 4.60656 9.16344 4.73898 9.37286 4.77106L12.272 5.19165C12.517 5.22665 12.7218 5.39581 12.8029 5.62915C12.8793 5.86306 12.8134 6.11973 12.6337 6.28831L10.452 8.35331Z" fill="#F6BF4D"/>
                                                    </svg>
                                                    {item.profile_rank}
                                                </p>
                                                <p className={classes.profile_info_rewiews}>({item.profile_rewiews} отзыва)</p>
                                            </div>
                                        </div>
                                    </div>
                                    <hr className={classes.profile_info_line}/>
                                    <div className={classes.profile_info_contacts}>
                                        <div className={classes.profile_info_contacts_heading}>
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M14.1673 8.00024C14.1673 11.4062 11.4067 14.1669 8.00067 14.1669C4.59466 14.1669 1.83398 11.4062 1.83398 8.00024C1.83398 4.59423 4.59466 1.83356 8.00067 1.83356C11.4067 1.83356 14.1673 4.59423 14.1673 8.00024Z" stroke="#23262F" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M10.2878 9.96182L7.77441 8.46248V5.23114" stroke="#23262F" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                            На сайте с 30.01.2022
                                        </div>
                                        <div className={classes.profile_info_contacts_contact}>
                                            <p className={classes.profile_info_contacts_theme}>
                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M7.68719 8.31484C10.3466 10.9735 10.9499 7.89772 12.6431 9.58979C14.2756 11.2218 15.2138 11.5487 13.1455 13.6164C12.8865 13.8246 11.2404 16.3294 5.45576 10.5464C-0.329641 4.76257 2.17374 3.11486 2.382 2.85587C4.45527 0.78246 4.7766 1.72615 6.40902 3.35812C8.10227 5.0509 5.0278 5.65618 7.68719 8.31484Z" stroke="#23262F" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                                Номер Телефона
                                            </p>
                                            <p className={classes.profile_info_contacts_body}>+7 929 184 84 43</p>
                                        </div>
                                        <div className={classes.profile_info_contacts_contact}>
                                            <p className={classes.profile_info_contacts_theme}>
                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M2 13.9999L3.1 11.4666C2.25844 10.272 1.88178 8.81127 2.0407 7.35866C2.19961 5.90604 2.88319 4.56134 3.96314 3.57693C5.04309 2.59252 6.44517 2.03606 7.90625 2.01198C9.36734 1.98791 10.787 2.49787 11.8988 3.44617C13.0106 4.39446 13.7381 5.7159 13.9448 7.1625C14.1515 8.60909 13.8231 10.0814 13.0214 11.3031C12.2197 12.5248 10.9996 13.4119 9.59026 13.798C8.1809 14.1841 6.67908 14.0425 5.36667 13.3999L2 13.9999" stroke="#23262F" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M6 6.66663C6 6.75503 6.03512 6.83982 6.09763 6.90233C6.16014 6.96484 6.24493 6.99996 6.33333 6.99996C6.42174 6.99996 6.50652 6.96484 6.56904 6.90233C6.63155 6.83982 6.66667 6.75503 6.66667 6.66663V5.99996C6.66667 5.91155 6.63155 5.82677 6.56904 5.76426C6.50652 5.70174 6.42174 5.66663 6.33333 5.66663C6.24493 5.66663 6.16014 5.70174 6.09763 5.76426C6.03512 5.82677 6 5.91155 6 5.99996V6.66663ZM6 6.66663C6 7.55068 6.35119 8.39853 6.97631 9.02365C7.60143 9.64877 8.44928 9.99996 9.33333 9.99996H10C10.0884 9.99996 10.1732 9.96484 10.2357 9.90233C10.2982 9.83982 10.3333 9.75503 10.3333 9.66663C10.3333 9.57822 10.2982 9.49344 10.2357 9.43092C10.1732 9.36841 10.0884 9.33329 10 9.33329H9.33333C9.24493 9.33329 9.16014 9.36841 9.09763 9.43092C9.03512 9.49344 9 9.57822 9 9.66663C9 9.75503 9.03512 9.83982 9.09763 9.90233C9.16014 9.96484 9.24493 9.99996 9.33333 9.99996" stroke="#23262F" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                                Номер Телефона
                                            </p>
                                            <p className={classes.profile_info_contacts_body}>+7 929 184 84 43</p>
                                        </div>
                                    </div>
                                    <div className={classes.profile_info_communication}>
                                        <button className={classes.profile_info_write}>
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12.7139 12.7132C10.6765 14.7508 7.65952 15.191 5.19062 14.0493C4.82615 13.9025 4.52733 13.7839 4.24326 13.7839C3.452 13.7886 2.46712 14.5558 1.95525 14.0446C1.44338 13.5326 2.21118 12.547 2.21118 11.751C2.21118 11.4668 2.09728 11.1734 1.95056 10.8082C0.808228 8.33967 1.24908 5.32171 3.28651 3.28472C5.88741 0.682873 10.113 0.682873 12.7139 3.28405C15.3195 5.88992 15.3148 10.112 12.7139 12.7132Z" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M10.6262 8.27523H10.6322" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M7.95338 8.27523H7.95938" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M5.28053 8.27523H5.28653" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                            Написать продавцу
                                        </button>
                                        <button className={classes.profile_info_call}>
                                            <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M8.18815 8.31488C10.8475 10.9735 11.4508 7.89777 13.1441 9.58983C14.7765 11.2218 15.7147 11.5488 13.6465 13.6164C13.3874 13.8246 11.7414 16.3295 5.95673 10.5464C0.17134 4.76263 2.67472 3.11492 2.88297 2.85593C4.95624 0.782523 5.27757 1.72621 6.90999 3.35818C8.60323 5.05096 5.52876 5.65624 8.18815 8.31488Z" stroke="#23262F" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                            Забронировать Звонок
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div className={classes.profile_status}>
                                <p className={classes.profile_status_views}>
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12.6344 10.0441C12.6344 11.4991 11.4544 12.6783 9.99941 12.6783C8.5444 12.6783 7.36523 11.4991 7.36523 10.0441C7.36523 8.58829 8.5444 7.40912 9.99941 7.40912C11.4544 7.40912 12.6344 8.58829 12.6344 10.0441Z" stroke="#23262F" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M9.9977 16.129C13.171 16.129 16.0735 13.8473 17.7077 10.0439C16.0735 6.2406 13.171 3.95892 9.9977 3.95892H10.001C6.82769 3.95892 3.92519 6.2406 2.29102 10.0439C3.92519 13.8473 6.82769 16.129 10.001 16.129H9.9977Z" stroke="#23262F" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    224 просмотра
                                </p>
                                <p className={classes.profile_status_favorites}>
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M16.4491 5.128C16.4491 2.83559 14.8818 1.91663 12.6253 1.91663H7.32624C5.1391 1.91663 3.5 2.77294 3.5 4.97511V17.245C3.5 17.8498 4.1508 18.2308 4.67795 17.935L9.99626 14.9517L15.2686 17.93C15.7966 18.2274 16.4491 17.8465 16.4491 17.2408V5.128Z" stroke="#23262F" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M6.89258 7.5233H12.9912" stroke="#23262F" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    32 сохранения
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div className={classes.recommendations}>
                <AdsRecommendations ads={ads}/>
            </div>
        </div>
    );
};

export default Advertisement;
