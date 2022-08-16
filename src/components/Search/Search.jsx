import React from 'react';
import classes from './Search.module.css';

const Search = () => {
    return (
        <div className={classes.wrapper}>
            <div className={classes.about}>
                <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.4" d="M8.15088 1.07573L9.6352 4.05859C9.74456 4.2747 9.95327 4.42477 10.194 4.45812L13.528 4.94371C13.7228 4.97105 13.8995 5.07377 14.0188 5.23052C14.1368 5.38526 14.1875 5.58136 14.1588 5.77413C14.1355 5.93421 14.0602 6.08229 13.9448 6.19568L11.5289 8.53754C11.3522 8.70095 11.2722 8.94308 11.3149 9.17987L11.9097 12.4722C11.973 12.8697 11.7097 13.2446 11.3149 13.32C11.1522 13.346 10.9855 13.3186 10.8388 13.2439L7.86482 11.6945C7.6441 11.5831 7.38338 11.5831 7.16267 11.6945L4.18869 13.2439C3.82328 13.438 3.37051 13.306 3.16714 12.9458C3.09179 12.8024 3.06512 12.639 3.08979 12.4795L3.68458 9.18654C3.72726 8.95042 3.64657 8.70696 3.47054 8.54354L1.05468 6.20301C0.767285 5.92554 0.758617 5.46864 1.03534 5.18116C1.04134 5.17516 1.04801 5.16849 1.05468 5.16182C1.16937 5.04509 1.32007 4.97105 1.48277 4.95171L4.81683 4.46546C5.05688 4.43144 5.26559 4.2827 5.37561 4.06526L6.80659 1.07573C6.93395 0.819603 7.19801 0.660188 7.48474 0.666858H7.57409C7.82281 0.696873 8.03952 0.850952 8.15088 1.07573Z" fill="#9757D7"/>
                    <path d="M7.49469 11.6114C7.36555 11.6154 7.23975 11.6501 7.12659 11.7122L4.16715 13.2581C3.80505 13.4309 3.37171 13.2968 3.16869 12.9505C3.09348 12.8091 3.06619 12.6469 3.09148 12.4881L3.68257 9.2021C3.72251 8.96324 3.64263 8.72038 3.4689 8.55224L1.05196 6.21232C0.76507 5.93142 0.759745 5.47037 1.04065 5.1828C1.04464 5.1788 1.04797 5.17546 1.05196 5.17213C1.16645 5.0587 1.31422 4.98397 1.47331 4.96062L4.81016 4.46955C5.05179 4.43886 5.26147 4.28807 5.36797 4.06922L6.8184 1.04207C6.95618 0.797869 7.22044 0.652416 7.50001 0.667762C7.49469 0.865925 7.49469 11.4766 7.49469 11.6114Z" fill="#9757D7"/>
                </svg>
                <p className={classes.badge}>КРУПНЕЙШАЯ ДОСКА БЕСПЛАТНЫХ ОБЪЯВЛЕНИЙ</p>
            </div>
            <p className={classes.heading}>Поиск объявлений</p>
            <div className={classes.container}>
                <select className={classes.categories} name="" id="">
                    <option className={classes.category} value="">
                        Все категории
                    </option>
                </select>
                <input className={classes.search} type="text" placeholder='Например: Квартира в Эстонии...'/>
                <div className={classes.region_container}>
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M14.5 10.5005C14.5 9.11924 13.3808 8 12.0005 8C10.6192 8 9.5 9.11924 9.5 10.5005C9.5 11.8808 10.6192 13 12.0005 13C13.3808 13 14.5 11.8808 14.5 10.5005Z" stroke="#23262F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9995 21C10.801 21 4.5 15.8984 4.5 10.5633C4.5 6.38664 7.8571 3 11.9995 3C16.1419 3 19.5 6.38664 19.5 10.5633C19.5 15.8984 13.198 21 11.9995 21Z" stroke="#23262F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <select name="" id="" className={classes.regions}>
                        <option value="" className={classes.region}>Все регионы</option>
                    </select>
                </div>
                <button className={classes.enter}>
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="9.80547" cy="9.8055" r="7.49047" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M15.0153 15.4043L17.9519 18.3333" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
            </div>
        </div>
    );
};

export default Search;
