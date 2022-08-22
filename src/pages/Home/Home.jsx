import React from 'react';
import classes from "./Home.module.css";
import Search from "../../components/Search/Search";
import AdsCategories from "../../components/AdsCategories/AdsCategories";
import AdsVips from "../../components/AdsVips/AdsVips";
import AdsRecommendations from "../../components/AdsRecommendations/AdsRecommendations";
import DB_categories from '../../DATABASE/Categories.json'
import DB_vips from '../../DATABASE/Vips.json'
import DB_recommendations from '../../DATABASE/Recommendations.json'

const Home = () => {
    return (
        <div className={classes.home}>
            <Search />
            <AdsCategories heading='Категории' ads={DB_categories}/>
            <AdsVips heading='VIP Объявления' ads={DB_vips}/>
            <AdsRecommendations heading='Рекомендуем вам' ads={DB_recommendations}/>
        </div>
    );
};

export default Home;
