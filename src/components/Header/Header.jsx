import React from 'react';
import { Link } from "react-router-dom";
import classes from "./Header.module.css";

const Header = () => {
    return (
        <header className={classes.header}>
            <div className={classes.left}>
                <div className={classes.logo}>
                    <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="1" y="1" width="46" height="46" rx="23" fill="#23262F"/>
                        <g filter="url(#filter0_d_1617_7216)">
                            <path d="M15.8182 18C15.8182 16.9715 15.8182 16.4572 16.1377 16.1377C16.4572 15.8182 16.9715 15.8182 18 15.8182H21.2727C22.3012 15.8182 22.8155 15.8182 23.135 16.1377C23.4545 16.4572 23.4545 16.9715 23.4545 18V21.2727C23.4545 22.3012 23.4545 22.8155 23.135 23.135C22.8155 23.4545 22.3012 23.4545 21.2727 23.4545H18C16.9715 23.4545 16.4572 23.4545 16.1377 23.135C15.8182 22.8155 15.8182 22.3012 15.8182 21.2727V18Z" fill="url(#paint0_linear_1617_7216)"/>
                            <path d="M24.5455 26.7273C24.5455 25.6988 24.5455 25.1845 24.865 24.865C25.1845 24.5455 25.6988 24.5455 26.7273 24.5455H30C31.0285 24.5455 31.5428 24.5455 31.8623 24.865C32.1818 25.1845 32.1818 25.6988 32.1818 26.7273V30C32.1818 31.0285 32.1818 31.5428 31.8623 31.8623C31.5428 32.1818 31.0285 32.1818 30 32.1818H26.7273C25.6988 32.1818 25.1845 32.1818 24.865 31.8623C24.5455 31.5428 24.5455 31.0285 24.5455 30V26.7273Z" fill="url(#paint1_linear_1617_7216)"/>
                            <path d="M24.5455 16.7018C24.5455 15.4282 24.5455 14.7913 24.9411 14.3957C25.3368 14 25.9736 14 27.2473 14H31.2982C32.5718 14 33.2087 14 33.6043 14.3957C34 14.7913 34 15.4282 34 16.7018V20.7527C34 22.0264 34 22.6632 33.6043 23.0589C33.2087 23.4545 32.5718 23.4545 31.2982 23.4545H27.2473C25.9736 23.4545 25.3368 23.4545 24.9411 23.0589C24.5455 22.6632 24.5455 22.0264 24.5455 20.7527V16.7018Z" fill="url(#paint2_linear_1617_7216)"/>
                            <path d="M14 27.2473C14 25.9736 14 25.3368 14.3957 24.9411C14.7913 24.5455 15.4282 24.5455 16.7018 24.5455H20.7527C22.0264 24.5455 22.6632 24.5455 23.0589 24.9411C23.4545 25.3368 23.4545 25.9736 23.4545 27.2473V31.2982C23.4545 32.5718 23.4545 33.2087 23.0589 33.6043C22.6632 34 22.0264 34 20.7527 34H16.7018C15.4282 34 14.7913 34 14.3957 33.6043C14 33.2087 14 32.5718 14 31.2982V27.2473Z" fill="url(#paint3_linear_1617_7216)"/>
                        </g>
                        <rect x="1" y="1" width="46" height="46" rx="23" stroke="url(#paint4_linear_1617_7216)" stroke-width="2"/>
                        <defs>
                            <filter id="filter0_d_1617_7216" x="11.5866" y="12.7933" width="24.8267" height="24.8267" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                                <feOffset dy="1.20668"/>
                                <feGaussianBlur stdDeviation="1.20668"/>
                                <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.15 0"/>
                                <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_1617_7216"/>
                                <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_1617_7216" result="shape"/>
                            </filter>
                            <linearGradient id="paint0_linear_1617_7216" x1="29.9694" y1="15.1873" x2="16.7234" y2="29.6048" gradientUnits="userSpaceOnUse">
                                <stop stop-color="white"/>
                                <stop offset="1" stop-color="#FCFCFD" stop-opacity="0.75"/>
                            </linearGradient>
                            <linearGradient id="paint1_linear_1617_7216" x1="29.9694" y1="15.1873" x2="16.7234" y2="29.6048" gradientUnits="userSpaceOnUse">
                                <stop stop-color="white"/>
                                <stop offset="1" stop-color="#FCFCFD" stop-opacity="0.75"/>
                            </linearGradient>
                            <linearGradient id="paint2_linear_1617_7216" x1="29.9694" y1="15.1873" x2="16.7234" y2="29.6048" gradientUnits="userSpaceOnUse">
                                <stop stop-color="white"/>
                                <stop offset="1" stop-color="#FCFCFD" stop-opacity="0.75"/>
                            </linearGradient>
                            <linearGradient id="paint3_linear_1617_7216" x1="29.9694" y1="15.1873" x2="16.7234" y2="29.6048" gradientUnits="userSpaceOnUse">
                                <stop stop-color="white"/>
                                <stop offset="1" stop-color="#FCFCFD" stop-opacity="0.75"/>
                            </linearGradient>
                            <linearGradient id="paint4_linear_1617_7216" x1="24" y1="0" x2="24" y2="48" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#818181" stop-opacity="0.27"/>
                                <stop offset="1" stop-opacity="0.42"/>
                            </linearGradient>
                        </defs>
                    </svg>
                    <p><b>NOOMB</b>ADS</p>
                </div>
                <div className={classes.languages}>
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_1617_7221)">
                            <rect width="20" height="20" rx="10" fill="#1A47B8"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M-2.66667 13.3333H25.3333V20H-2.66667V13.3333Z" fill="#F93939"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M-2.66667 0H25.3333V6.66667H-2.66667V0Z" fill="white"/>
                        </g>
                        <rect x="0.5" y="0.5" width="19" height="19" rx="9.5" stroke="#23262F" stroke-opacity="0.1"/>
                        <defs>
                            <clipPath id="clip0_1617_7221">
                                <rect width="20" height="20" rx="10" fill="white"/>
                            </clipPath>
                        </defs>
                    </svg>
                    <select name="lang" id="">
                        <option value="RU" selected>RU</option>
                    </select>
                </div>
            </div>
            <div className={classes.menu}>
                <Link className={[classes.link, classes.active].join(' ')} to='/'>Объявления</Link>
                <Link className={classes.link} to='/'>Магазины</Link>
                <Link className={classes.link} to='/'>Услуги</Link>
                <Link className={classes.link} to='/'>Блог</Link>
            </div>
            <div className={classes.auth}>
                <Link className={classes.login} to='/Login/Email'>Войти</Link>
                <Link className={classes.publish} to='/publish'>Выставить объявление</Link>
            </div>
        </header>
    );
};

export default Header;
